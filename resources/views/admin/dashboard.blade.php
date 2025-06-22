@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')


    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->

    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 1-->
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3> {{ $totalProjects }} </h3>

                            <p>Projects</p>
                        </div>
                        <svg class="small-box-icon me-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M2.25 5.25A2.25 2.25 0 014.5 3h5.379a2.25 2.25 0 011.59.659l.822.822a.75.75 0 00.53.219H19.5A2.25 2.25 0 0121.75 6.75v10.5A2.25 2.25 0 0119.5 19.5h-15A2.25 2.25 0 012.25 17.25V5.25zM3.75 6.75v10.5c0 .414.336.75.75.75h15a.75.75 0 00.75-.75V6.75a.75.75 0 00-.75-.75h-6.679a2.25 2.25 0 01-1.59-.659l-.822-.822a.75.75 0 00-.53-.219H4.5a.75.75 0 00-.75.75z">
                            </path>
                        </svg>
                        <a href="{{ route('admin.projects.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                    <!--end::Small Box Widget 1-->
                </div>
                <!--end::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 2-->
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{ $totalSectors }}</h3>
                            <p>Sectors</p>
                        </div>
                        <svg class="small-box-icon me-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M3 3.75A.75.75 0 013.75 3h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5A.75.75 0 013 9.25v-5.5zM3 14.75a.75.75 0 01.75-.75h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5A.75.75 0 013 20.25v-5.5zM14.75 3a.75.75 0 00-.75.75v5.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-5.5A.75.75 0 0020.25 3h-5.5zM14 14.75a.75.75 0 01.75-.75h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5a.75.75 0 01-.75-.75v-5.5z">
                            </path>
                        </svg>
                        <a href="{{ route('admin.sectors.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                    <!--end::Small Box Widget 2-->
                </div>
                <!--end::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 3-->
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>{{ $totalWorkflows }}</h3>
                            <p>Workflow</p>
                        </div>
                        <svg class="small-box-icon me-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M3 4.5A1.5 1.5 0 014.5 3h3a1.5 1.5 0 011.5 1.5V6h6V4.5A1.5 1.5 0 0116.5 3h3A1.5 1.5 0 0121 4.5v3A1.5 1.5 0 0119.5 9h-3A1.5 1.5 0 0115 7.5V6h-6v1.5A1.5 1.5 0 017.5 9h-3A1.5 1.5 0 013 7.5v-3zM3 13.5A1.5 1.5 0 014.5 12h15a1.5 1.5 0 010 3h-15A1.5 1.5 0 013 13.5zm0 6A1.5 1.5 0 014.5 18h3A1.5 1.5 0 019 19.5V21h6v-1.5a1.5 1.5 0 011.5-1.5h3A1.5 1.5 0 0121 19.5v.75a.75.75 0 01-1.5 0v-.75a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75h-6A.75.75 0 018.25 21v-.75a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75v.75a.75.75 0 01-1.5 0v-.75z">
                            </path>
                        </svg>
                        <a href="{{ route('admin.workflow.index') }}"
                            class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                    <!--end::Small Box Widget 3-->
                </div>
                <!--end::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 4-->
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3>{{ $totalFeatures }}</h3>
                            <p>Features</p>
                        </div>
                        <svg class="small-box-icon me-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M11.25 2.25a.75.75 0 00-1.207.661l1.082 4.33H7.5a.75.75 0 00-.66 1.207l6.75 9a.75.75 0 001.207-.661l-1.082-4.33h3.625a.75.75 0 00.66-1.207l-6.75-9z">
                            </path>
                        </svg>
                        <a href="{{ route('admin.features.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                    <!--end::Small Box Widget 4-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>


    {{-- Customer Table --}}
    <div class="row">
        <div class="col-lg-12 px-4">


            <table id="customerTable" class="table table-bordered table-striped dashboard-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Organization Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Message</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.dashboard.customer.contact.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'organization_name',
                        name: 'organization_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
