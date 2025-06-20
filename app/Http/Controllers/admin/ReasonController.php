<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\ReasonRequest;
use App\Http\Requests\ReasonUpdateRequest;
use App\Repository\ReasonRepository;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Str;
use Yajra\DataTables\Facades\DataTables;
class ReasonController extends Controller
{
    protected ReasonRepository $reasonRepo;
    

    public function __construct(ReasonRepository $reasonRepo){
        $this->reasonRepo = $reasonRepo;
    }
    public function index(){
        return view('admin.reasons.index');
    }

    public function store(ReasonRequest $request){

        try{
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['title']). '-'. uniqid();

            if($request->hasFile('icon')){
                $image = $request->file('icon');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('reason_images', $imageName, 'public');
                $validated['icon'] = $path;
            }

            $this->reasonRepo->store($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Reason created successfully!',
            ]);


        }
        catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong.',
            ], 500);
        }

    }

    public function show(){
        $reason = $this->reasonRepo->getAllReason();

        return DataTables::of($reason)
        ->addIndexColumn()
        ->addColumn('description', function($row){
            return strlen($row->description) > 50
            ? substr($row->description, 0, 100). '...'
            : $row->description;
        })
        ->addColumn('icon', function($row){
             $imagePath = url('storage/' . $row->icon);
             return '<img src="' . $imagePath. '" alt="Reason Image" width="50" height="50">';
        })
        ->addColumn('actions', function($row){
            return '
            <button class="btn btn-primary border-0 edit-reason" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editReasonModal">
            <i class="fa-regular fa-pen-to-square"></i>
        </button>

        <button class="btn bg-danger border-0 delete-reason" data-id="' . $row->id . '">
            <i class="fa-solid fa-trash"></i>
        </button>
            ';
        })
        ->rawColumns(['description', 'icon', 'actions'])
        ->make(true);
    }

    public function edit(string $id){
        $reason = $this->reasonRepo->findById($id);
        return response()->json($reason);
    }

    public function update(ReasonUpdateRequest $request, string $id){

        $reason = $this->reasonRepo->findById($id);
        $validated = $request->validated();

        if($request->hasFile('icon')){
            if($reason->icon && Storage::disk('public')->exists($reason->icon)){
                Storage::disk('public')->delete($reason->icon);
            }

            $image = $request->file('icon');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('reason_images', $imageName, 'public');

            $validated['icon'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $this->reasonRepo->update($reason, $validated);

        return response()->json([
            
            'success' => true,
            'message' => 'Reason updated successfully',
        ]);
    }

    public function destroy(string $id){

        $reason = $this->reasonRepo->findById($id);

        if($reason->icon && Storage::disk('public')->exists($reason->icon)){
            Storage::disk('public')->delete($reason->icon);
        }
        $this->reasonRepo->delete($reason);
        return response()->json([
            'messsage' => 'Reason deleted successfully',
        ]);
    }
}
