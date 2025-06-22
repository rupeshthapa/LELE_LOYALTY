<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
    @stack('styles')

</head>

<body>
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')
    @stack('scripts')
</body>

</html>
