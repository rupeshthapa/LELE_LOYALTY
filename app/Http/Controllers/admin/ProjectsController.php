<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Repository\ProjectRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Http\JsonResponse;
use Log;
use Yajra\DataTables\Facades\DataTables;

class ProjectsController extends Controller
{
    protected ProjectRepository $projectRepo;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepo = $projectRepo;
    }

    public function index()
    {
        return view('admin.projects.index');
    }

    public function store(ProjectRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();

            // Unique slug with uniqid to avoid collision
            $validated['slug'] = Str::slug($validated['name']) . '-' . uniqid();

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Store in storage/app/public/projects_logo
                $path = $image->storeAs('projects_logo', $imageName, 'public');
                $validated['logo'] = $path;
            }

            $this->projectRepo->store($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Project created successfully!',
            ]);
        } catch (Exception $e) {
            Log::error('Project Store Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Something went wrong.'], 500);
        }
    }

    public function show()
    {
        $projects = $this->projectRepo->getAllForDataTable();

        return DataTables::of($projects)
        ->addIndexColumn()
            ->addColumn('url', function ($row) {
                return $row->url ? '<a href="' . e($row->url) . '" target="_blank">' . e($row->url) . '</a>' : 'N/A';
            })
           ->addColumn('logo', function ($row) {
            $logoPath = asset('storage/' . $row->logo);
            return '<img src="' . $logoPath . '" alt="Logo" width="50" height="50">';
            })
            ->addColumn('actions', function ($row) {
                return '
                    <button class="btn btn-primary border-0 edit-projects" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editProjectModal">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btn bg-danger border-0 delete-projects" data-id="' . $row->id . '">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['url', 'logo', 'actions'])
            ->make(true);
    }

    public function edit(string $id): JsonResponse
    {
        $project = $this->projectRepo->findById($id);
        return response()->json($project);
    }

    public function update(ProjectUpdateRequest $request, string $id): JsonResponse
    {
        $project = $this->projectRepo->findById($id);

        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($project->logo && Storage::disk('public')->exists($project->logo)) {
                Storage::disk('public')->delete($project->logo);
            }

            $image = $request->file('logo');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('projects_logo', $imageName, 'public');
            $validated['logo'] = $path;
        }

        // Update slug to slugified name
        $validated['slug'] = Str::slug($validated['name']);

        $this->projectRepo->update($project, $validated);

        return response()->json(['success' => true, 'message' => 'Project updated successfully.']);
    }

    public function destroy(string $id): JsonResponse
    {
        $project = $this->projectRepo->findById($id);

        // Delete logo file if exists
        if ($project->logo && Storage::disk('public')->exists($project->logo)) {
            Storage::disk('public')->delete($project->logo);
        }

        $this->projectRepo->delete($project);

        return response()->json(['message' => 'Project deleted successfully!']);
    }
}
