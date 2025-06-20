<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.header')

@stack('styles')
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
   @include("admin.partial.navbar")

        @include("admin.partial.sidebar")

        <main class="app-main" style="margin-left: 250px; padding: 1rem; margin-bottom: 100px;">

        @yield("content")
        </main>


        @include("admin.layouts.footer")

        </div>


        @stack('modals')

        @stack('scripts')

</body>
</html>