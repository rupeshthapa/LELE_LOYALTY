@extends('admin.layouts.app')

@section('title', 'Reason')
@push('styles')
      
@endpush

@section('content')
     

    <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid my-5">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Reasons</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i class="fas fa-home me-1"></i> Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-brain me-1"></i> Reasons</li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            
       
                <button class="btn btn-primary d-flex align-items-center mb-4" data-bs-toggle="modal"
                    data-bs-target="#addReasonModal">
                    <i class="fas fa-circle-plus me-2"></i>
                    Add New Record
                </button>

                
                    <table id="reasonTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
    </div>

@endsection

@push('modals')
@include('modals.reasons.edit')
@include('modals.reasons.create')
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {

            $(document).on('click', '#reasonCloseBtn, #reasonCancelBtn', function(){
                $('#createReasonForm')[0].reset();
            });

            $('#reasonTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.reasons.show') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
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
                        data: 'icon',
                        name: 'icon',
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


            $('#createReasonForm').on('submit', function (e) {
                e.preventDefault();

                $('#reasonTitleError, #reasonDescriptionError, #reasonIconError').text('').hide();
                $('#reason_title, #description_id, #icon_id').removeClass('is-invalid');

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.reasons.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response){
                        showToast('success', response.message);
                        $('#createReasonForm')[0].reset();
                        const modelEl = document.getElementById('addReasonModal');
                        const modal = bootstrap.Modal.getInstance(modelEl);

                        if(modal){
                            modal.hide();
                        }

                        setTimeout(() => {
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $('body').css('padding-right', '');
                        }, 300);
                        $('#reasonTable').DataTable().ajax.reload();
                    },
                    error: function(xhr){
                        if(xhr.status === 422){
                            let errors = xhr.responseJSON.errors;
                            if(errors.title){
                                $('#reasonTitleError').text(errors.title[0]).show();
                                $('#reason_title').addClass('is-invalid');
                            }
                            if(errors.description){
                                $('#reasonDescriptionError').text(errors.description[0]).show();
                                $('#description_id').addClass('is-invalid');
                            }
                            if(errors.icon){
                                $('#reasonIconError').text(errors.icon[0]).show();
                                $('#icon_id').addClass('is-invalid');
                            }
                        }
                        else{
                           showToast('error', xhr.responseJSON?.message || 'An error occurred.');
                        }
                    }
                });
            });


            $(document).on('click', '.edit-reason', function(){
                let id = $(this).data('id');
                
                $.ajax({
                    url: "{{ route('admin.reasons.edit', ['id' => ':id']) }}".replace(':id', id),
                    type: "GET",
                    success: function(response){
                        $('#editReasonForm').data('id', id);
                        $('#edit_reason_title').val(response.title);
                        $('#edit_description_id').val(response.description);
                        
                        if(response.icon){
                            $('#editIconPreview').attr("src", `/storage/${response.icon}`).show();
                        }
                        else{
                            $('#editIconPreview').hide();
                        }
                    }
                });
            });


            $('#editReasonForm').on('submit', function(e){
                e.preventDefault();
                let id = $('#editReasonForm').data('id');
                console.log('Reason ID being sent:', id);
                let formData = new FormData(this);

                $('#edit_reasonTitleError, #edit_reasonDescriptionError').text('').hide();
                $('#edit_reason_title, #edit_description_id').removeClass('is-invalid');

                $.ajax({
                    url: "{{ route('admin.reasons.update', ':id') }}".replace(':id', id),
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        showToast('success', response.message);
                        $('#editReasonModal').modal('hide');
                        $('#reasonTable').DataTable().ajax.reload();
                    },
                    error: function(xhr){
                        if(xhr.status === 422){
                            let errors = xhr.responseJSON.errors;
                            if(errors.title){
                                $('#edit_reasonTitleError').text(errors.title[0]).show();
                                $('#edit_reason_title').addClass('is-invalid');
                            }
                            if(errors.description){
                                $('#edit_reasonDescriptionError').text(errors.description[0]).show();
                                $('#edit_description_id').addClass('is-invalid');
                            }
                        }
                        else{
                            showToast('error', xhr.responseJSON?.message || 'An error occurred.');
                        }
                    }
                })

            });


            $(document).on('click', '.delete-reason', function(){
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                            url: '/admin/reasons/' + id,
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response){
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                                $('#reasonTable').DataTable().ajax.reload();
                            },
                            error: function(xhr){
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                )
                            }
                        });
                    }
                });
            })


        });
    </script>
@endpush