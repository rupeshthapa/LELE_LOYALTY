@extends('admin.layouts.app')

@section('title', 'Messages')
@push('styles')

@endpush
@section('content')
   

    <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid my-5">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Messages</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i class="fas fa-home me-1"></i> Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-envelope-open me-1"></i> Messages</li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            
                <button class="btn btn-primary d-flex align-items-center mb-4 mark-all-read">
                    <i class="fas fa-check-circle me-2"></i>
                    Mark As Read
                </button>

                    <table id="messageTable" class="table table-bordered table-striped " width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Messages</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                
        
    </div>
@endsection
@push('scripts')
<script>
$(document).ready(function () {
    const table = $('#messageTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.messages.show') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'message', name: 'message' },
            { data: 'status', name: 'status', orderable: false, searchable: false }
        ]
    });

    $('#messageTable').on('draw.dt', function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    $('#messageTable').on('click', '.toggle-status', function () {
        const id = $(this).data('id');
        $.ajax({
            url: `/admin/messages/toggle-status/${id}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                table.ajax.reload(null, false); // reload without reset
                fetchUnreadCount();
            }
        });
    });



        // Bind to the "Mark As Read" button
        $('.mark-all-read').on('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "This will mark all unread messages as read.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, mark all as read'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.messages.markAllRead') }}",
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.status === 'success') {
                                Swal.fire('Marked!', response.message, 'success');
                            } else {
                                Swal.fire('Info', response.message, 'info');
                            }

                            // Reload table and unread badge
                            $('#messageTable').DataTable().ajax.reload(null, false);
                            if (typeof fetchUnreadCount === 'function') {
                                fetchUnreadCount();
                            }
                        },
                        error: function () {
                            Swal.fire('Error', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });

});
</script>
@endpush