<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\AboutUpdateRequest;
use App\Repository\AboutRepository;

use App\Repository\ProjectRepository;
use Exception;
use Illuminate\Http\Request;
use Storage;
use Str;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    protected AboutRepository $aboutRepo;
    

    public function __construct(AboutRepository $aboutRepo){
        $this->aboutRepo = $aboutRepo;
        
    }
    public function index(){
        return view('admin.about.index');
    }

 public function store(AboutRequest $request)
{
    try {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('about_images', $imageName, 'public');
            $validated['image'] = $path;
        }

        $this->aboutRepo->store($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'About created successfully!',
        ]);
    } catch (Exception $e) {
        
        return response()->json([
            'status' => 'error',
            'message' => 'Something went wrong.',
        ], 500); // Force JSON with proper status code
    }
}

public function show(){
    $about = $this->aboutRepo->getAllAbout();

    return DataTables::of($about)
    ->addIndexColumn()
    ->addColumn('description', function ($row) {
    return strlen($row->description) > 50
        ? substr($row->description, 0, 100) . '...'
        : $row->description;
})
    ->addColumn('image', function ($row){
        $imagePath = asset('storage/' . $row->image);
        return '<img src="' . $imagePath . '" alt="About Image" width="50" height="50">';

    })
    ->addColumn('actions', function ($row){
        return '
        <button class="btn btn-primary border-0 edit-about" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editAboutModal">
            <i class="fa-regular fa-pen-to-square"></i>
        </button>

        <button class="btn bg-danger border-0 delete-about" data-id="' . $row->id . '">
            <i class="fa-solid fa-trash"></i>
        </button>
        ';
    })
    ->rawColumns(['description', 'image', 'actions'])
    ->make(true);
}

public function edit(string $id){
    $about = $this->aboutRepo->findById($id);
    return response()->json($about);
}

    public function update(AboutUpdateRequest $request, string $id){
        $about = $this->aboutRepo->findById($id);

        $validated = $request->validated();

        if($request->hasFile('image')){
            if($about->image && Storage::disk('public')->exists($about->image)){
                Storage::disk('public')->delete($about->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('about_images', $imageName, 'public');
            $validated['image'] = $path;
        }
        $validated['slug'] = Str::slug($validated['title']);

        $this->aboutRepo->update($about, $validated);

        return response()->json([
            'success' => true,
            'message' => 'About updated successfully.',
        ]);
    }

    public function destroy(string $id){
        $about = $this->aboutRepo->findById($id);

        if($about->image && Storage::disk('public')->exists($about->image)){
            Storage::disk('public')->delete($about->image);
        }

        $this->aboutRepo->delete($about);
        return response()->json([
            'message' => 'About deleted successfully!',
        ]);
    

    }




}