@extends('admin.layouts.app')

@section('title', 'Messages')
@push('styles')
     <style>
        .breadcrumb-custom {
            background: #f0f4f8;
            padding: 0.9rem 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
            font-weight: 600;
            color: #343a40;
        }

        .breadcrumb-custom .breadcrumb-item+.breadcrumb-item::before {
            content: "›";
            padding: 0 0.75rem;
            color: #6c757d;
            font-weight: 700;
            font-size: 1.1rem;
            vertical-align: middle;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: #0d6efd;
            text-decoration: none;
            transition: color 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .breadcrumb-custom .breadcrumb-item a:hover {
            color: #0a58ca;
            text-decoration: underline;
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: #495057;
            display: inline-flex;
            align-items: center;
        }

        .breadcrumb-custom i {
            color: #0d6efd;
            margin-right: 6px;
        }
    </style>
@endpush
@section('content')
   

    <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
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
            </div>

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <button class="btn btn-primary d-flex align-items-center mb-4 mark-all-read">
                    <i class="fas fa-check-circle me-2"></i>
                    Mark As Read
                </button>

                <div class="table-responsive">
                    <table id="messageTable" class="table table-bordered table-striped table-sm">
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
            </div>
        </div>
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