<div class="app-sidebar-wrapper" style="position: fixed; top: 0; left: 0; height: 100vh; width: 250px; z-index: 1030; transition: transform 0.3s ease-in-out;">
  <aside class="app-sidebar bg-body-secondary shadow d-flex flex-column" data-bs-theme="dark"
         style="height: 100vh; width: 250px; overflow: hidden;">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard.index') }}" class="brand-link">
            <img src="{{ asset('storage/customerloyalty.png') }}" alt="Lele Logo"
                class="opacity-75 shadow" style="height: 100px; width: 100%;">
        </a>
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">CORE</li>
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">ADDONS</li>
                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-diagram-project"></i>
                        <p>Projects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.about.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>About</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.loyalty.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-gem"></i>
                        <p>Loyalty</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.sectors.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>Sectors</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.reasons.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-lightbulb"></i>
                        <p>Reasons</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.workflow.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>Workflow</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.features.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Features</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.office.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-landmark"></i>
                        <p>Office</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->

    <!--begin::Sidebar Footer-->
   <div class="sb-sidenav-footer p-2 border-top" style="margin-top: 1rem; background-color: rgba(0, 0, 0, 0.2); color: #fff;">
    <div class="small nav-link">Logged in as:</div>
    Admin
</div>

    <!--end::Sidebar Footer-->
</aside>
</div>
