<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
    @vite('resources/admin/css/app.css')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> --}}
    @yield('style')
</head>

<body>
    @include('includes.header')
    <div class="container">
            @yield('content')
    </div>

    @livewireScripts
    @vite('resources/admin/js/app.js')
    
    {{-- sweetalert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

{{-- end of sweetalert --}}
    @yield('scripts')
</body>

</html>
