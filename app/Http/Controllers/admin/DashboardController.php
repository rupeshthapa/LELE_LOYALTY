<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Http\Requests\FeatureUpdateRequest;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Workflow;
use App\Repository\FeatureRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Storage;
use Str;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{


    public function index()
{
    $totalProjects = Project::count();
    $totalSectors = Sector::count();
    $totalWorkflows = Workflow::count();
    $totalFeatures = Feature::count();

    return view('admin.dashboard', compact('totalProjects', 'totalSectors', 'totalFeatures', 'totalWorkflows'));
}

    public function customerContactData() {
    $customer = Contact::get();

    return DataTables::of($customer)
    ->addIndexColumn()
        ->addColumn('status', function ($data) {
               $daysDiff = Carbon::parse($data->created_at)->diffInDays(Carbon::now());
    $status = $daysDiff <= 1 ? 'New' : 'Old';
    $class = $status === 'New' ? 'badge bg-success' : 'badge bg-danger';

    return "<span class='{$class}'>{$status}</span>";
        })
        ->rawColumns(['status']) // Let HTML render properly
        ->make(true);
}

}
