@extends('admin.layouts.app')

@section('title', 'About')
@push('styles')
@endpush

@section('content')

    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid my-5">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">About</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                    class="fas fa-home me-1"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-question-circle me-1"></i>
                            About</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->


        <button class="btn btn-primary d-flex align-items-center mb-4" data-bs-toggle="modal"
            data-bs-target="#addAboutModal">
            <i class="fas fa-circle-plus me-2"></i>
            Add New Section
        </button>


        <table id="aboutTable" class="table table-bordered table-striped">
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
    @include('modals.about.edit')
    @include('modals.about.create')
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '#aboutCloseBtn, #aboutCancelBtn', function() {
                $('#aboutTitleError, #aboutDescriptionError, #aboutImageError').text('').hide();
                $('#about_name, #description_id, #image_id').removeClass('is-invalid');
                $('#createAboutForm')[0].reset();
            });

            $('#aboutTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.about.show') }}",
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
                        name: 'image',
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


            $('#createAboutForm').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages and styles
                $('#aboutTitleError, #aboutDescriptionError, #aboutImageError').text('').hide();
                $('#about_name, #description_id, #image_id').removeClass('is-invalid');

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.about.store') }}",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,

                    success: function(response) {

                        showToast('success', response.message);
                        $('#createAboutForm')[0].reset();

                        const modalEl = document.getElementById('addAboutModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        if (modal) {
                            modal.hide();
                        }

                        setTimeout(() => {
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $('body').css('padding-right', '');
                        }, 300);

                        $('#aboutTable').DataTable().ajax.reload();

                    },

                    error: function(xhr) {
                        // Log for debugging
                        console.log(xhr.responseText);

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.title) {
                                $('#aboutTitleError').text(errors.title[0]).show();
                                $('#about_name').addClass('is-invalid');
                            }
                            if (errors.description) {
                                $('#aboutDescriptionError').text(errors.description[0]).show();
                                $('#description_id').addClass('is-invalid');
                            }
                            if (errors.image) {
                                $('#aboutImageError').text(errors.image[0]).show();
                                $('#image_id').addClass('is-invalid');
                            }
                        } else {
                            showToast('error', xhr.responseJSON?.message ||
                                'An error occurred.');
                        }
                    }
                });
            });


            $(document).on('click', '.edit-about', function() {
                let id = $(this).data('id');
                $('#about_editTitleError, #about_editDescriptionError').text('').hide();
                $('#about_edit_title, #edit_description_id').removeClass('is-invalid');
                $.ajax({
                    url: "{{ route('admin.about.edit', ['id' => ':id']) }}".replace(':id', id),
                    type: "GET",

                    success: function(response) {
                        $('#editAboutForm').data('id', id);
                        $('#about_edit_title').val(response.title);
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


            $('#editAboutForm').on('submit', function(e) {
                e.preventDefault();
                let id = $('#editAboutForm').data('id');


                let formData = new FormData(this);

                $('#about_editTitleError, #about_editDescriptionError').text('').hide();
                $('#about_edit_title, #edit_description_id').removeClass('is-invalid');


                $.ajax({
                    url: '{{ route('admin.about.update', ':id') }}'.replace(':id', id),
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        showToast('success', response.message);

                        $('#editAboutModal').modal('hide');
                        $('#aboutTable').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            if (errors.title) {
                                $('#about_editTitleError').text(errors.title[0]).show();
                                $('#about_edit_title').addClass('is-invalid');
                            }

                            if (errors.description) {
                                $('#about_editDescriptionError').text(errors.description[0])
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

            $(document).on('click', '.delete-about', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This about will be deleted permanently!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/about/' + id,
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
                                $('#aboutTable').DataTable().ajax.reload();
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
