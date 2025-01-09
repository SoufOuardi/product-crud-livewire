<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title> <!-- Dynamic page title -->

    <!-- Link to app.css (compiled by Vite) -->
    @vite('resources/css/app.css')

    <!-- Livewire Styles -->
    @livewireStyles
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>

    <!-- Main Content -->
    <main>
        @yield('content') <!-- This is where child views will be injected -->
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @livewireScripts

    <script>
    Livewire.on('productAdded', (message) => {
        toastr.success(message, 'Success');
    });
    Livewire.on('productError', (message) => {
        toastr.error(message, 'Error');
    });
    </script>


</body>
</html>
