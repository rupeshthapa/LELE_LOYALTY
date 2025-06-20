<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
     <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    @stack('styles')

</head>
<body>
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')
    @stack('scripts')
</body>
</html>