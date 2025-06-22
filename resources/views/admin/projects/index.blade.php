@extends('admin.layouts.app')

@section('title', 'Projects')
@push('styles')
@endpush

@section('content')

    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid my-5">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Projects</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                    class="fas fa-home me-1"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-folder-open me-1"></i>
                            Projects</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->


        <button class="btn btn-primary d-flex align-items-center mb-4" data-bs-toggle="modal"
            data-bs-target="#addProjectModal">
            <i class="fas fa-circle-plus me-2"></i>
            Add New Project
        </button>

        <table id="projectsTable" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>URL</th>
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>


    </div>
@endsection

@push('modals')
    @include('modals.projects.create')
    @include('modals.projects.edit')
@endpush


@push('scripts')
    <script>
        $(document).ready(function() {


            $(document).on('click', '#projectCloseBtn, #projectCancelBtn', function() {
                $('#projectNameError, #projectDescriptionError, #projectImageError').text('').hide();
                $('#project_name, #description_id, #image_id').removeClass('is-invalid');
                $('#createProjectForm')[0].reset();
            });



            $('#projectsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.projects.show') }}",
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
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'url',
                        name: 'url'
                    },
                    {
                        data: 'logo',
                        name: 'logo',
                        orderable: false,
                        searchable: false
                    },

                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });





            $('#createProjectForm').on('submit', function(e) {
                e.preventDefault();

                $('#projectNameError, #projectDescriptionError, #projectImageError').text('').hide();
                $('#project_name, #description_id, #image_id').removeClass('is-invalid');

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.projects.store') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        showToast('success', response.message);

                        $('#createProjectForm')[0].reset();
                        const modalEl = document.getElementById('addProjectModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        if (modal) {
                            modal.hide();
                        }

                        setTimeout(() => {
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $('body').css('padding-right', '');
                        }, 300);
                        $('#projectsTable').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.name) {
                                $('#projectNameError').text(errors.name[0]).show();
                                $('#project_name').addClass('is-invalid');
                            }
                            if (errors.description) {
                                $('#projectDescriptionError').text(errors.description[0])
                                    .show();
                                $('#description_id').addClass('is-invalid');
                            }
                            if (errors.logo) {
                                $('#projectImageError').text(errors.logo[0]).show();
                                $('#image_id').addClass('is-invalid');
                            }
                        } else {
                            showToast('error', xhr.responseJSON?.message ||
                                'An error occurred.');
                        }
                    }
                });
            });


            $(document).on('click', '.edit-projects', function() {
                let id = $(this).data('id');
                $('#projectNameEditError, #projectDescriptionEditError, #projectImageError').text('')
                    .hide();
                $('#edit_project_name, #edit_description_id, #edit_image_id').removeClass('is-invalid');

                $.ajax({
                    url: '{{ route('admin.projects.edit', ['id' => ':id']) }}'.replace(':id', id),

                    type: "GET",
                    success: function(response) {
                        $('#editProjectForm').data('id', id);
                        $('#edit_project_name').val(response.name);
                        $('#edit_description_id').val(response.description);
                        $('#edit_url_id').val(response.url);

                        if (response.logo) {
                            $('#editLogoPreview').attr("src", `/storage/${response.logo}`)
                                .show();
                        } else {
                            $('#editLogoPreview').hide();
                        }
                    }

                });
            });


            $('#editProjectForm').on('submit', function(e) {
                e.preventDefault();
                let id = $('#editProjectForm').data('id');
                console.log('Project ID being sent:', id);

                let formData = new FormData(this);

                $('#projectNameEditError, #projectDescriptionEditError, #projectImageError').text('')
                    .hide();
                $('#edit_project_name, #edit_description_id, #edit_image_id').removeClass('is-invalid');


                $.ajax({
                    url: '{{ route('admin.projects.update', ':id') }}'.replace(':id', id),
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        showToast('success', response.message);

                        $('#editProjectModal').modal('hide');
                        $('#projectsTable').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            if (errors.name) {
                                $('#projectNameEditError').text(errors.name[0])
                                    .show(); // Set and show the error message
                                $('#edit_project_name').addClass('is-invalid');
                            }

                            if (errors.description) {
                                $('#projectDescriptionEditError').text(errors.description[0])
                                    .show();
                                $('#edit_description_id').addClass('is-invalid');
                            }

                            if (errors.logo) {
                                $('#projectImageError').text(errors.logo[0]).show();
                                $('#edit_image_id').addClass('is-invalid');
                            }
                        } else {
                            showToast('error', xhr.responseJSON?.message ||
                                'An error occurred.');
                        }
                    }

                });
            });

            $(document).on('click', '.delete-projects', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This project will be deleted permanently!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/projects/' + id,
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                                $('#projectsTable').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });



        });
    </script>
@endpush
