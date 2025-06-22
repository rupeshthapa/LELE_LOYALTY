@extends('admin.layouts.app')

@section('title', 'Features')
@push('styles')
@endpush
@section('content')


    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid my-5">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Features</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                    class="fas fa-home me-1"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tools me-1"></i> Features
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->


        <button class="btn btn-primary d-flex align-items-center mb-4" data-bs-toggle="modal"
            data-bs-target="#addFeatureModal">
            <i class="fas fa-circle-plus me-2"></i>
            Add New Record
        </button>


        <table id="featureTable" class="table table-bordered table-striped ">
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
    @include('modals.features.edit')
    @include('modals.features.create')
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '#featureCloseBtn, #cancelFeatureBtn', function() {
                $('#featureTitleError, #featureDescriptionError, #featureClassError, #imageClassError, #featureImageError')
                    .text('').hide();
                $('#feature_title, #feature_description, #feature_class, #image_class, #feature_image')
                    .removeClass('is-invalid');
                $('#createFeatureForm')[0].reset();
            });

            $('#featureTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.feature.show') }}",

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'title',
                        name: 'title',

                    },
                    {
                        data: 'description',
                        name: 'description',
                    },
                    {
                        data: 'image',
                        name: 'image',
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                    },
                ]
            });

            $('#feature_class').on('change', function() {
                const featureClass = $(this).val();
                let imageClass = '';

                if (featureClass === 'rotate-class') {
                    imageClass = 'rotate';
                } else if (featureClass === 'shake-class' || featureClass === 'shakehorizontal-class') {
                    imageClass = 'shake';
                } else if (featureClass === 'scale-class') {
                    imageClass = 'scale';
                }

                $('#image_class').val(imageClass); // update and trigger change if needed
            });

            // Handle form submit with AJAX
            $('#createFeatureForm').on('submit', function(e) {
                e.preventDefault();

                // Clear previous errors
                $('#featureTitleError, #featureDescriptionError, #featureClassError, #imageClassError, #featureImageError')
                    .text('').hide();
                $('#feature_title, #feature_description, #feature_class, #image_class, #feature_image')
                    .removeClass('is-invalid');

                // Update hidden input before sending
                $('#image_class_hidden').val($('#image_class').val());

                // Prepare form data
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.features.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,

                    success: function(response) {
                        showToast('success', response.message);

                        $('#createFeatureForm')[0].reset();

                        const modalEl = document.getElementById('addFeatureModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);

                        if (modal) {
                            modal.hide();
                        }

                        setTimeout(() => {
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $('body').css('padding-right', '');
                        }, 300);

                        $('#featureTable').DataTable().ajax.reload();
                    },

                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            if (errors.title) {
                                $('#featureTitleError').text(errors.title[0]).show();
                                $('#feature_title').addClass('is-invalid');
                            }
                            if (errors.description) {
                                $('#featureDescriptionError').text(errors.description[0])
                            .show();
                                $('#feature_description').addClass('is-invalid');
                            }
                            if (errors.class) {
                                $('#featureClassError').text(errors.class[0]).show();
                                $('#feature_class').addClass('is-invalid');
                            }
                            if (errors.image_class) {
                                $('#imageClassError').text(errors.image_class[0]).show();
                                $('#image_class').addClass('is-invalid');
                            }
                            if (errors.image) {
                                $('#featureImageError').text(errors.image[0]).show();
                                $('#feature_image').addClass('is-invalid');
                            }
                        } else {
                            showToast('error', xhr.responseJSON?.message ||
                                'An error occurred.');
                        }
                    }
                });
            });

            $(document).on('click', '.edit-feature', function() {
                let id = $(this).data('id');
                $('#editFeatureTitleError, #editFeatureDescriptionError, #editFeatureClassError, #editImageClassError, #editFeatureImageError')
                    .text('').hide();
                $('#editFeature_title, #editFeature_description, #editFeature_class, #edit_image_class, #editFeature_image')
                    .removeClass('is-invalid');
                $.ajax({
                    url: "{{ route('admin.feature.edit', ['id' => ':id']) }}".replace(':id', id),
                    type: "GET",
                    success: function(response) {
                        $('#editFeatureForm').data('id', id);
                        $('#editFeature_title').val(response.title);
                        $('#editFeature_description').val(response.description);
                        $('#editFeature_class').val(response.class);

                        // Set image_class dropdown and hidden input
                        $('#edit_image_class').val(response.image_class);
                        $('#edit_image_class_hidden').val(response.image_class);

                        if (response.image) {
                            $('#imagePreview').attr("src", `/storage/${response.image}`).show();
                            $('#imagePreviewWrapper').show();
                        } else {
                            $('#imagePreviewWrapper').hide();
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Failed to fetch feature data.');
                    }
                });
            });

            // Sync image_class based on editFeature_class selection, keep hidden input updated
            $('#editFeature_class').on('change', function() {
                const featureClass = $(this).val();
                let imageClass = '';

                if (featureClass === 'rotate-class') {
                    imageClass = 'rotate';
                } else if (featureClass === 'shake-class' || featureClass == 'shakehorizontal-class') {
                    imageClass = 'shake';
                } else if (featureClass === 'scale-class') {
                    imageClass = 'scale';
                }

                $('#edit_image_class').val(imageClass);
                $('#edit_image_class_hidden').val(imageClass);
            });


            $('#editFeatureForm').on('submit', function(e) {
                e.preventDefault();

                let id = $('#editFeatureForm').data('id');

                $('#editFeatureTitleError, #editFeatureDescriptionError, #editFeatureClassError, #editImageClassError, #editFeatureImageError')
                    .text('').hide();
                $('#editFeature_title, #editFeature_description, #editFeature_class, #edit_image_class, #editFeature_image')
                    .removeClass('is-invalid');


                $('#edit_image_class_hidden').val($('#edit_image_class').val());

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.feature.update', ':id') }}".replace(':id', id),
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        showToast('success', response.message);
                        $('#editFeatureModal').modal('hide');
                        $('#featureTable').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            if (errors.title) {
                                $('#editFeatureTitleError').text(errors.title[0]).show();
                                $('#editFeature_title').addClass('is-invalid');
                            }
                            if (errors.description) {
                                $('#editFeatureDescriptionError').text(errors.description[0])
                                    .show();
                                $('#editFeature_description').addClass('is-invalid');
                            }
                            if (errors.class) {
                                $('#editFeatureClassError').text(errors.class[0]).show();
                                $('#editFeature_class').addClass('is-invalid');
                            }
                            if (errors.image_class) {
                                $('#editImageClassError').text(errors.image_class[0]).show();
                                $('#edit_image_class').addClass('is-invalid');
                            }
                            if (errors.image) {
                                $('#editFeatureImageError').text(errors.image[0]).show();
                                $('#editFeature_image').addClass('is-invalid');
                            }
                        } else {
                            showToast('error', xhr.responseJSON?.message ||
                                'An error occurred.');
                        }
                    }
                });
            });



            $(document).on('click', '.delete-feature', function() {
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
                            url: "/admin/feature/" + id,
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                                $('#featureTable').DataTable().ajax.reload();
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
