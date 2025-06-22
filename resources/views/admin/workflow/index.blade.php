@extends('admin.layouts.app')

@section('title', 'Workflow')

@push('styles')
@endpush

@section('content')

    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid my-5">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Workflow</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                    class="fas fa-home me-1"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-sitemap me-1"></i> Workflow
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->

        <button class="btn btn-primary d-flex align-items-center mb-4" data-bs-toggle="modal"
            data-bs-target="#addWorkflowModal">
            <i class="fas fa-circle-plus me-2"></i>
            Add New Record
        </button>


        <table id="workflowTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>

    </div>
@endsection

@push('modals')
    @include('modals.workflow.edit')
    @include('modals.workflow.create')
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '#workflowCloseBtn, #workflowCancelBtn', function() {
                $('#workflowTitleError, #workflowDescriptionError, #workflowImageError').text('').hide();
                $('#workflow_title, #description_id, #image_id').removeClass('is-invalid');
                $('#createWorkflowForm')[0].reset();
            });


            $('#workflowTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.workflow.show') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            })


            $('#createWorkflowForm').on('submit', function(e) {
                e.preventDefault();

                $('#workflowTitleError, #workflowDescriptionError, #workflowImageError').text('').hide();
                $('#workflow_title, #description_id, #image_id').removeClass('is-invalid');

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.workflow.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        showToast('success', response.message);
                        $('#createWorkflowForm')[0].reset();

                        const modalEl = document.getElementById('addWorkflowModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);

                        if (modal) {
                            modal.hide();
                        }

                        setTimeout(() => {
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $('body').css('padding-right', '');
                        }, 300);

                        $('#workflowTable').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.title) {
                                $('#workflowTitleError').text(errors.title[0]).show();
                                $('#workflow_title').addClass('is-invalid');
                            }
                            if (errors.description) {
                                $('#workflowDescriptionError').text(errors.description[0])
                                .show();
                                $('#description_id').addClass('is-invalid');
                            }
                            if (errors.image) {
                                $('#workflowImageError').text(errors.image[0]).show();
                                $('#image_id').addClass('is-invalid');
                            }
                        } else {
                            showToast('error', xhr.responseJSON?.message ||
                                'An error occurred.');
                        }
                    }
                });
            });

            $(document).on('click', '.edit-workflow', function() {
                let id = $(this).data('id');
                $('#edit_workflowTitleError, #edit_workflowDescriptionError').text('').hide();
                $('#edit_workflow_title, #edit_description_id').removeClass('is-invalid');
                $.ajax({
                    url: "{{ route('admin.workflow.edit', ':id') }}".replace(':id', id),
                    type: "GET",
                    success: function(response) {
                        $('#editWorkflowForm').data('id', id);
                        $('#edit_workflow_title').val(response.title); // fixed typo
                        $('#edit_description_id').val(response.description);

                        if (response.image) {
                            $('#edit_image_preview').attr("src", `/storage/${response.image}`)
                                .show();
                        } else {
                            $('#edit_image_preview').hide();
                        }
                    }
                });
            });

            $('#editWorkflowForm').on('submit', function(e) {
                e.preventDefault();

                let id = $(this).data('id');

                $('#edit_workflowTitleError, #edit_workflowDescriptionError').text('').hide();
                $('#edit_workflow_title, #edit_description_id').removeClass('is-invalid');

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.workflow.update', ':id') }}".replace(':id', id),
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,

                    success: function(response) {
                        showToast('success', response.message);

                        $('#editWorkflowModal').modal('hide');
                        $('#workflowTable').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.title) {
                                $('#edit_workflowTitleError').text(errors.title[0]).show();
                                $('#edit_workflow_title').addClass('is-invalid');
                            }
                            if (errors.description) {
                                $('#edit_workflowDescriptionError').text(errors.description[0])
                                    .show();
                                $('#edit_description_id').addClass('is-invalid');
                            }
                        } else {
                            showToast('error', xhr.responseJSON?.message ||
                                'An error occurred.');
                        }
                    }
                });

            });

            $(document).on('click', '.delete-workflow', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You cannot undo it!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/workflow/" + id,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                                $('#workflowTable').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                )
                            }
                        });
                    }
                });
            });

        });
    </script>
@endpush
