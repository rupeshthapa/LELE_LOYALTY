@extends('admin.layouts.app')

@section('title', 'Loyalty')
@push('styles')
@endpush

@section('content')

    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid my-5">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Loyalty</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                    class="fas fa-home me-1"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-certificate me-1"></i>
                            Loyalty</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->


        <button class="btn btn-primary d-flex align-items-center mb-4" data-bs-toggle="modal"
            data-bs-target="#addLoyaltyModal">
            <i class="fas fa-circle-plus me-2"></i>
            Add New Record
        </button>


        <table id="loyaltyTable" class="table table-bordered table-striped">
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
    @include('modals.loyalty.edit')
    @include('modals.loyalty.create')
@endpush


@push('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '#loyaltyCloseBtn, #loyaltyCancelBtn', function() {
                $('#createLoyaltyForm')[0].reset();
            });



            $('#loyaltyTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.loyalty.show') }}",
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
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                    }
                ]
            });



            $('#createLoyaltyForm').on('submit', function(e) {
                e.preventDefault();

                $('#loyaltyTitleError, #loyaltyDescriptionError, #loyaltyImageError').text('').hide();
                $('#loyalty_name, #description_id, #image_id').removeClass('is-invalid');

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.loyalty.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        // toastr.success(response.message);


                        showToast('success', response.message);


                        $('#createLoyaltyForm')[0].reset();

                        const modalEl = document.getElementById('addLoyaltyModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);

                        if (modal) {
                            modal.hide();
                        }

                        setTimeout(() => {
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $('body').css('padding-right', '');
                        }, 300);

                        $('#loyaltyTable').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            if (errors.title) {
                                $('#loyaltyTitleError').text(errors.title[0]).show();
                                $('#loyalty_name').addClass('is-invalid');
                            }
                            if (errors.description) {
                                $('#loyaltyDescriptionError').text(errors.description[0])
                            .show();
                                $('#description_id').addClass('is-invalid');
                            }
                            if (errors.image) {
                                $('#loyaltyImageError').text(errors.image[0]).show();
                                $('#image_id').addClass('is-invalid');
                            }
                        } else {
                            showToast('error', xhr.responseJSON?.message ||
                                'An error occurred.');

                        }
                    }
                });
            });


            $(document).on('click', '.edit-loyalty', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.loyalty.edit', ['id' => ':id']) }}".replace(':id', id),
                    type: "GET",
                    success: function(response) {
                        $('#editLoyaltyForm').data('id', id);
                        $('#loyalty_edit_title').val(response.title);
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


            $('#editLoyaltyForm').on('submit', function(e) {
                e.preventDefault();
                let id = $('#editLoyaltyForm').data('id');


                let formData = new FormData(this);

                $('#loyalty_editTitleError, #loyalty_editDescriptionError').text('').hide();
                $('#loyalty_edit_title, #edit_description_id').removeClass('is-invalid');


                $.ajax({
                    url: '{{ route('admin.loyalty.update', ':id') }}'.replace(':id', id),
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        showToast('success', response.message);

                        $('#editLoyaltyModal').modal('hide');
                        $('#loyaltyTable').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            if (errors.title) {
                                $('#loyalty_editTitleError').text(errors.title[0]).show();
                                $('#loyalty_edit_title').addClass('is-invalid');
                            }

                            if (errors.description) {
                                $('#loyalty_editDescriptionError').text(errors.description[0])
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

            $(document).on('click', '.delete-loyalty', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "This cannot be undone!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/loyalty/' + id,
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
                                $('#loyaltyTable').DataTable().ajax.reload();
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
