<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkflowRequest;
use App\Http\Requests\WorkflowUpdateRequest;
use App\Repository\WorkflowRepository;
use Exception;
use Illuminate\Http\Request;
use Storage;
use Str;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class WorkflowController extends Controller
{
    protected WorkflowRepository $workflowRepo;

    public function __construct(WorkflowRepository $workflowRepo){
        $this->workflowRepo = $workflowRepo;
    }
    public function index(){
        return view('admin.workflow.index');
    }

    public function store(WorkflowRequest $request){
        try{
            $validated = $request->validated();

            $validated['slug'] = Str::slug($validated['title']);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('workflow_images', $imageName, 'public');

                $validated['image'] = $path;
            }

            $this->workflowRepo->store($validated);
            return response()->json([
                'status' => 'success',
                'message' => 'Workflow added successfully!',
            ]);

        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'error' => 'Something went wrong.',
            ], 500);
        }
    }

    public function show(){
        $workflow = $this->workflowRepo->getAllData();
        return DataTables::of($workflow)
        ->addIndexColumn()
        ->addColumn('description', function($row){
            return strlen($row->description) > 50
            ? substr($row->description, 0, 100) . '...'
            : $row->description;
        })
        ->addColumn('image', function($row){
            $imagePath = asset('storage/' . $row->image);
            return '<img src="' . $imagePath . '" alt="About Image" width="50" height="50">';
        })
        ->addColumn('actions', function($row){
            return '
        <button class="btn btn-primary border-0 edit-workflow" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editWorkflowModal">
            <i class="fa-regular fa-pen-to-square"></i>
        </button>

        <button class="btn bg-danger border-0 delete-workflow" data-id="' . $row->id . '">
            <i class="fa-solid fa-trash"></i>
        </button>
        ';
        })
        ->rawColumns(['description', 'image', 'actions'])
        ->make(true);
    }

    public function edit(string $id){
        $workflow = $this->workflowRepo->findById($id);
        return response()->json($workflow);
    }

    public function update(WorkflowUpdateRequest $request, string $id){
       $workflow = $this->workflowRepo->findById($id);
        $validated = $request->validated();

        if($request->hasFile('image')){
            if($workflow->image && Storage::disk('public')->exists($workflow->image)){
                Storage::disk('public')->delete($workflow->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('workflow_image', $imageName, 'public');
            $validated['image'] = $path;
        }
        $validated['slug'] = Str::slug($validated['title']);
        $this->workflowRepo->update($workflow, $validated);

        return response()->json([
            'success' => true,
            'message' => 'Workflow updated successfully!',
        ]);
    }

    public function destroy(string $id){
        $workflow = $this->workflowRepo->findById($id);

        if($workflow->image && Storage::disk('public')->exists($workflow->image)){
            Storage::disk('public')->delete($workflow->image);
        }
        $this->workflowRepo->delete($workflow);
        return response()->json([
            'message' => 'Workflow deleted successfully!',
        ]);
    }
}
