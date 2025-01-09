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


    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>
<body>

    <!-- Main Content -->
    <main>
        @yield('content') <!-- This is where child views will be injected -->
    </main>


    <!-- Livewire Scripts -->
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr JS script to display notifications -->
    <script type="text/javascript">
        window.livewire.on('alert', param => {
        toastr[param['type']](param['message'],param['type'])});
</script>

</body>
</html>
