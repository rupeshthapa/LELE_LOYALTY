@extends('admin.layouts.app')

@section('title', 'Sectors')
@push('styles')
@endpush
@section('content')


    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid my-5">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Sectors</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                    class="fas fa-home me-1"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-puzzle-piece me-1"></i>
                            Sectors</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->

        <button class="btn btn-primary d-flex align-items-center mb-4" data-bs-toggle="modal"
            data-bs-target="#addSectorModal">
            <i class="fas fa-circle-plus me-2"></i>
            Add New Record
        </button>


        <table id="sectorTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>

    </div>
@endsection

@push('modals')
    @include('modals.sectors.edit')
    @include('modals.sectors.create')
@endpush


@push('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '#sectorCloseBtn, #sectorCancelBtn', function() {
                $('#sectorTitleError, #sectorImageError').text('').hide();
                $('#sector_title, #image_id').removeClass('is-invalid');
                $('#createSectorForm')[0].reset();
            });


            $('#sectorTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.sectors.show') }}",
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



            $('#createSectorForm').on('submit', function(e) {
                e.preventDefault();

                $('#sectorTitleError, #sectorImageError').text('').hide();
                $('#sector_title, #image_id').removeClass('is-invalid');

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.sectors.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        showToast('success', response.message);

                        $('#createSectorForm')[0].reset();
                        $('#addSectorModal').modal('hide');
                        $('#sectorTable').DataTable().ajax.reload();

                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.title) {
                                $('#sectorTitleError').text(errors.title[0]).show();
                                $('#sector_title').addClass('is-invalid');
                            }
                            if (errors.image) {
                                $('#sectorImageError').text(errors.image[0]).show();
                                $('#image_id').addClass('is-invalid');
                            }
                        } else {
                            showToast('error', xhr.responseJSON?.message ||
                                'An error occurred.');
                        }
                    }
                })
            });

            $(document).on('click', '.edit-sector', function() {
                let id = $(this).data('id');
                $('#edit_sectorTitleError').text('').hide();
                $('#edit_sector_title').removeClass('is-invalid');
                $.ajax({
                    url: "{{ route('admin.sectors.edit', ['id' => ':id']) }}".replace(':id', id),
                    type: "GET",
                    success: function(response) {
                        $('#editSectorForm').data('id', id);
                        $('#edit_sector_title').val(response.title);
                        if (response.image) {
                            $('#edit_image_preview').attr("src", `/storage/${response.image}`)
                                .show();

                        } else {
                            $('#edit_image_preview').hide();

                        }
                    }
                });

            });


            $('#editSectorForm').on('submit', function(e) {
                e.preventDefault();

                let id = $('#editSectorForm').data('id');

                let formData = new FormData(this);

                $('#edit_sectorTitleError').text('').hide();
                $('#edit_sector_title').removeClass('is-invalid');

                $.ajax({
                    url: "{{ route('admin.sectors.update', ':id') }}".replace(':id', id),
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        showToast('success', response.message);

                        $('#editSectorModal').modal('hide');
                        $('#sectorTable').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.title) {
                                $('#edit_sectorTitleError').text(errors.title[0]).show();
                                $('#edit_sector_title').addClass('is-invalid');
                            }

                        } else {
                            showToast('error', xhr.responseJSON?.message ||
                                'An error occurred.');
                        }
                    }


                })
            });


            $(document).on('click', '.delete-sector', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This sector will be deleted permanently!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/sectors/' + id,
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
                                $('#sectorTable').DataTable().ajax.reload();
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
