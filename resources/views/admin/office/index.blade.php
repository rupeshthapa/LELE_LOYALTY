@extends('admin.layouts.app')


@section('title', 'Office')
@push('styles')
     
@endpush
@section('content')


    <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid my-5">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Office</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i class="fas fa-home me-1"></i> Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-briefcase me-1"></i> Office</li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            
    
            <button class="btn btn-primary d-flex align-items-center mb-4" data-bs-toggle="modal"
                data-bs-target="#addOfficeModal">
                <i class="fas fa-circle-plus me-2"></i>
                Add New Information
            </button>

            <table id="officeTable" class="table table-bordered table-striped">
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
    @include('modals.office.edit')
    @include('modals.office.create')
@endpush

@push('scripts')
    <script>

        $(document).ready(function(){

            $(document).on('click', '#officeCloseBtn, #officeCancelBtn', function(){
                $('#createOfficeForm')[0].reset();
            });

            $('#officeTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.office.show') }}",
                columns: [
                    {
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
                        data: 'icon',
                        name: 'icon',
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                    }
                ]
            });



            $('#createOfficeForm').on('submit', function(e){
                e.preventDefault();

                $('officeTitleError, #officeDescriptionError, #officeIconError').text('').hide();
                $('#office_title, #office_description, #office_icon').removeClass('is-invalid');

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.office.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response){
                       showToast('success', response.message);
                        $('#createOfficeForm')[0].reset();

                        const modalEl = document.getElementById('addOfficeModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);

                        if(modal){
                            modal.hide()
                        }

                        setTimeout(() =>{
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $('body').css('padding-right', '');
                        }, 300);
                        $('#officeTable').DataTable().ajax.reload();
                    },
                    error:function(xhr){
                        if(xhr.status === 422){
                            let errors = xhr.responseJSON.errors;
                            if(errors.title){
                                $('#officeTitleError').text(errors.title[0]).show();
                                $('#office_title').addClass('is-invalid');
                            }
                            if(errors.description){
                                $('#officeDescriptionError').text(errors.description[0]).show();
                                $('#office_description').addClass('is-invalid');
                            }
                            if(errors.icon){
                                $('#officeIconError').text(errors.icon[0]).show();
                                $('#office_icon').addClass('is-invalid');
                            }

                        }
                        else{
                            showToast('error', xhr.responseJSON?.message || 'An error occurred.');
                        }
                    }
                });
            });


            $(document).on('click', '.edit-office', function(){

                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.office.edit', ['id' => ':id']) }}".replace(':id', id),
                    type: "GET",

                    success:function(response){

                        $('#editOfficeForm').data('id', id);
                        $('#edit_office_title').val(response.title);
                        $('#edit_office_description').val(response.description);
                        $('#edit_office_icon').val(response.icon);
                    }
                });

            });


            $('#editOfficeForm').on('submit', function(e){
                e.preventDefault();

                $('#editOfficeTitleError, #editOfficeDescriptionError, #editOfficeIconError').text('').hide();
                $('#edit_office_title, #edit_office_description, #edit_office_icon').removeClass('is-invalid');

                let formData = new FormData(this);
                let id = $(this).data('id');  // GET THE ID YOU STORED

                $.ajax({
                    url: "{{ route('admin.office.update', ':id') }}".replace(':id', id),
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,

                    success:function(response){
                        showToast('success', response.message);
                        $('#editOfficeModal').modal('hide'); // use modal('hide') instead of .hide()
                        $('#officeTable').DataTable().ajax.reload();
                    },
                    error: function(xhr){
                        if(xhr.status === 422){
                            let errors = xhr.responseJSON.errors;
                            if(errors.title){
                                $('#editOfficeTitleError').text(errors.title[0]).show();
                                $('#edit_office_title').addClass('is-invalid');
                            }
                            if(errors.description){
                                $('#editOfficeDescriptionError').text(errors.description[0]).show();
                                $('#edit_office_description').addClass('is-invalid');
                            }
                            if(errors.icon){
                                $('#editOfficeIconError').text(errors.icon[0]).show();
                                $('#edit_office_icon').addClass('is-invalid');
                            }
                        }
                        else{
                            showToast('error', xhr.responseJSON?.message || 'An error occurred.');
                        }
                    }
                });
            });


            $(document).on('click', '.delete-office', function(){
                let id = $(this).data('id');

               Swal.fire({
                title: 'Are you sure you want to delete this office?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
               }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                            url: '/admin/office/' + id,
                            method: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response){
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                                $('#officeTable').DataTable().ajax.reload();
                            },
                            error: function(xhr){
                                Swal.fire(
                                    'Error',
                                    'Something went wrong!',
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