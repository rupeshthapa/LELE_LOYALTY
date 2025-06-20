@php
    use App\Models\Contact;
@endphp


        <nav class="app-header navbar navbar-expand bg-body" style="margin-left: 250px; padding: 1rem;">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>
                <!--end::Start Navbar Links-->
                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">




                    <!--begin::Messages Dropdown Menu-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#">
                            <i class="bi bi-chat-text"></i>
                            <span class="navbar-badge badge text-bg-danger" id="unreadBadge">{{ $count }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-2 shadow-lg rounded-3">
                            <!-- Notifications -->
                            @forelse ($notifications as $notification)
                                <div class="dropdown-item d-flex align-items-start mb-2 border-bottom pb-2">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0 fw-semibold text-dark">
                                                {{ $notification->name }}
                                            </h6>
                                            <span class="text-warning fs-7">
                                                <i class="bi bi-star-fill"></i>
                                            </span>
                                        </div>
                                        <p class="mb-1 small text-muted">{{ $notification->message }}</p>
                                        <div class="d-flex align-items-center small text-secondary">
                                            <i class="bi bi-clock-fill me-1"></i> 
                                            <span>{{  \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="dropdown-item text-center text-muted small">No new messages</div>
                            @endforelse

                            <div class="dropdown-divider my-2"></div>

                            <a href="{{ route('admin.messages.index') }}" class="dropdown-item dropdown-footer text-center text-primary fw-semibold">
                                See All Messages
                            </a>
                        </div>

                    </li>
                    <!--end::Messages Dropdown Menu-->






                    <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>
                    <!--end::Fullscreen Toggle-->





                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-user fa-fw"></i>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-2 shadow rounded-3">
                            <!--begin::Menu Footer-->
                            <li>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item text-danger d-flex align-items-center gap-2">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Signout
                                    </button>
                                </form>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>

                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>






