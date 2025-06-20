<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeRequest;
use App\Http\Requests\OfficeUpdateRequest;
use App\Repository\OfficeRepository;
use Exception;
use Illuminate\Http\Request;
use Str;
use Yajra\DataTables\Facades\DataTables;

class OfficeController extends Controller
{

    protected OfficeRepository $officeRepo;

    public function __construct(OfficeRepository $officeRepo){
        $this->officeRepo = $officeRepo;
    }

    public function index(){
        return view('admin.office.index');
    }

    public function store(OfficeRequest $request){
        try{

            $validated = $request->validated();

            $validated['slug'] = Str::slug($validated['title']);

            $this->officeRepo->store($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Office information added successfully!'
            ]);


        }catch(Exception $e){
            dd($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong!'
            ]);
        }
    }


    public function show(){
        $office = $this->officeRepo->getData();

        return DataTables::of($office)
        ->addIndexColumn()
        ->addColumn('description', function($row){
            $data = explode('/n', $row->description);
            $string = implode('<br>', $data);                   
            return strlen($row->description) > 50
            ? substr($string, 0, 100) . '...'
            : $string;
        })
        ->addColumn('icon', function($row){
            return '<i class="' . $row->icon . '"></i>';
        })
        ->addColumn('actions', function($row){
            return '

           <button class="btn btn-primary border-0 edit-office" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editOfficeModal">
            <i class="fa-regular fa-pen-to-square"></i>
        </button>

        <button class="btn bg-danger border-0 delete-office" data-id="' . $row->id . '">
            <i class="fa-solid fa-trash"></i>
        </button>
            ';
        })
        ->rawColumns(['description', 'icon', 'actions'])
        ->make(true);

    }

    public function edit(string $id){
        $office = $this->officeRepo->findById($id);

        return response()->json($office);
    }

    public function update(OfficeUpdateRequest $request, string $id){
        $office = $this->officeRepo->findById($id);

        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);

        $this->officeRepo->update($office, $validated);

        return response()->json([
            'success' => true,
            'message' => 'Office information updated successfully!',
        ]);

    }


    public function destroy(string $id){
        $office = $this->officeRepo->findById($id);
        $this->officeRepo->delete($office);
        return response()->json([
            'success' => 'Office information deleted successfully!'
        ]);
    }
}
