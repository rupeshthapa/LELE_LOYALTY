<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectorRequest;
use App\Http\Requests\SectorUpdateRequest;
use App\Repository\SectorRepository;
use Exception;
use Illuminate\Http\Request;
use Storage;
use Str;
use Yajra\DataTables\Facades\DataTables;

class SectorsController extends Controller
{
    protected $sectorRepo;

    public function __construct(SectorRepository $sectorRepo){
        $this->sectorRepo = $sectorRepo;
    }
    public function index(){
        return view('admin.sectors.index');
    }

    public function store(SectorRequest $request){
        try {
            $validated = $request->validated();
            
            $validated['slug'] = Str::slug($validated['title']);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('sector_images', $imageName, 'public');
                $validated['image'] = $path;
            }

            $this->sectorRepo->store($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Sector created successfully!',
            ]);

        } catch(Exception $e){
            dd($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong.',
            ], 500);            
        }
    }


    public function show(){
        $sector = $this->sectorRepo->getAllForDataTable();

        return DataTables::of($sector)
        ->addIndexColumn()
        ->addColumn('image', function ($row){
            $imagePath = asset('storage/' . $row->image);
            return '<img src="' . $imagePath . '" alt="Sector Image" width="50">';

        })
        ->addColumn('actions', function($row){
            return '
                <button class="btn btn-primary border-0 edit-sector" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editSectorModal">
            <i class="fa-regular fa-pen-to-square"></i>
        </button>

        <button class="btn bg-danger border-0 delete-sector" data-id="' . $row->id . '">
            <i class="fa-solid fa-trash"></i>
        </button>
            ';
        })
        ->rawColumns(['image', 'actions'])
        ->make(true);
    }


    public function edit($id){
        $sector = $this->sectorRepo->findById($id);
        return response()->json($sector);
    }

    public function update(SectorUpdateRequest $request, string $id){
        $sector = $this->sectorRepo->findById($id);

        $validated = $request->validated();

        if($request->hasFile('image')){
            if($sector->image && Storage::disk('public')->exists($sector->image)){
                Storage::disk('public')->delete($sector->image);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('sector_images', $imageName, 'public');

            $validated['image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $this->sectorRepo->update($sector, $validated);

        return response()->json([
            'success' => true,
            'message' => 'Sector updated successfully.',

        ]);
    }

    public function destroy(string $id){
        $sector = $this->sectorRepo->findById($id);

        if($sector->image && Storage::disk('public')->exists($sector->image)){
            Storage::disk('public')->delete($sector->image);
        }

        $this->sectorRepo->delete($sector);
        return response()->json([
            'message' => 'Sector deleted successfully!',
        ]);
        
    }
}
