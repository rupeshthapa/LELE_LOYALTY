<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Http\Requests\FeatureUpdateRequest;
use App\Repository\FeatureRepository;
use Exception;
use Illuminate\Http\Request;
use Storage;
use Str;
use Yajra\DataTables\Facades\DataTables;

class FeatureController extends Controller
{

    protected FeatureRepository $featureRepo;

    public function __construct(FeatureRepository $featureRepo){
        $this->featureRepo = $featureRepo;
    }
    public function index(){
        return view('admin.features.index');
    }

    public function store(FeatureRequest $request){
        try{

            $validated = $request->validated();

            $validated['slug'] = Str::slug($validated['title']);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('feature_images', $imageName, 'public');

                $validated['image'] = $path;

                $this->featureRepo->store($validated);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Feature added successfully!'
                ]);

            }


        }catch (Exception $e){
            dd($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong!' 
            ], 500);
        }
    }


    public function show(){
        $feature = $this->featureRepo->getData();

        return DataTables::of($feature)
        ->addIndexColumn()
        ->addColumn('description', function($row){
            return strlen($row->description) > 50
            ? substr($row->description, 0, 100) . '...'
            : $row->description;
        })
        ->addColumn('image', function($row){
            $imagePath = asset('storage/' . $row->image);
            return '<img src="' . $imagePath . '" alt="Feautre Image" width="50" height="50">';
        })
        ->addColumn('actions', function($row){
             return '
        <button class="btn btn-primary border-0 edit-feature" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editFeatureModal">
            <i class="fa-regular fa-pen-to-square"></i>
        </button>

        <button class="btn bg-danger border-0 delete-feature" data-id="' . $row->id . '">
            <i class="fa-solid fa-trash"></i>
        </button>
        ';
        })
        ->rawColumns(['description', 'image', 'actions'])
        ->make(true);
    }

    public function edit(string $id){
        $feature = $this->featureRepo->findeById($id);
        return response()->json($feature);
    }

    public function update(FeatureUpdateRequest $request, string $id){
        $feature = $this->featureRepo->findeById($id);

        $validated = $request->validated();

        if($request->hasFile('image')){
            if($feature->image && Storage::disk('public')->exists($feature->image)){
                Storage::disk('public')->delete($feature->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('feature_images', $imageName, 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $this->featureRepo->update($feature, $validated);

        return response()->json([
            'success' => true,
            'message' => 'Feature updated successfully.',
        ]);

    }


    public function destroy(string $id){
        $feature = $this->featureRepo->findeById($id);

        if($feature->image && Storage::disk('public')->exists($feature->image)){
            Storage::disk('public')->delete($feature->image);
        }

        $this->featureRepo->delete($feature);

        return response()->json([
            'message' => 'About deleted successfully!',
        ]);
    }

}
