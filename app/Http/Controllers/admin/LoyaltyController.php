<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoyaltyRequest;
use App\Http\Requests\LoyaltyUpdateRequest;
use App\Repository\LoyaltyRepository;
use Exception;
use Illuminate\Http\Request;
use Storage;
use Str;
use Yajra\DataTables\Facades\DataTables;

class LoyaltyController extends Controller
{
    protected LoyaltyRepository $loyaltyRepo;

    public function __construct(LoyaltyRepository $loyaltyRepo){

        $this->loyaltyRepo = $loyaltyRepo;

    }
    public function index(){
        return view('admin.loyalty.index');
    }
    
    public function store(LoyaltyRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('loyalty_images', $imageName, 'public');
                $validated['image'] = $path;
            }

            $this->loyaltyRepo->store($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Loyalty created successfully!',
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong.',
            ], 500);
        }
    }

    public function show(){
        $loyalty = $this->loyaltyRepo->getAllForDataTable();

        return DataTables::of($loyalty)
        ->addIndexColumn()
        ->addColumn('description', function ($row){
            return strlen($row->description) > 50
            ? substr($row->description, 0, 100). '...'
            : $row->description;
        })
        ->addColumn('image', function($row){
            $imagePath = asset('storage/' . $row->image);
            return '<img src="' .$imagePath. '" alt="Loyalty Image" width="50" height="50">';
        })
        ->addColumn('actions', function ($row){
            return '
            <button class="btn btn-primary border-0 edit-loyalty" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editLoyaltyModal">
            <i class="fa-regular fa-pen-to-square"></i>
        </button>

        <button class="btn bg-danger border-0 delete-loyalty" data-id="' . $row->id . '">
            <i class="fa-solid fa-trash"></i>
        </button>
            ';
        })
        ->rawColumns(['description', 'image', 'actions'])
        ->make(true);
    }

    public function edit(string $id){
        $loyalty = $this->loyaltyRepo->findById($id);
        return response()->json($loyalty);
    }

    public function update(LoyaltyUpdateRequest $request, string $id){
        $loyalty = $this->loyaltyRepo->findById($id);

        $validated = $request->validated();

        if($request->hasFile('image')){
            if($loyalty->image && Storage::disk('public')->exists($loyalty->image)){
                Storage::disk('public')->delete($loyalty->image);
            }
            $image = $request->file('image');
            $imageName = time(). '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('loyalty_images', $imageName, 'public');
            $validated['image'] = $path;
        
        }
        $validated['slug'] = Str::slug($validated['title']);

        $this->loyaltyRepo->update($loyalty, $validated);

        return response()->json([
            'success' => true,
            'message' => 'Loyalty updated successfully.',
        ]);
    }


    public function destroy(string $id){
        $loyalty = $this->loyaltyRepo->findById($id);

        if($loyalty->image && Storage::disk('public')->exists($loyalty->image)){
            Storage::disk('public')->delete($loyalty->image);
        }

        $this->loyaltyRepo->delete($loyalty);
        return response()->json([
            'message' => 'Loyalty deleted successfully!',
        ]);
    }

}
