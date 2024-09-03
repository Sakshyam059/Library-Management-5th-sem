<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('datatable/datatables.css') }}">

    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />




    <!-- Scripts -->
    <script src="{{ asset('datatable/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('datatable/datatables.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/styles.css'])
</head>

<body class="font-sans antialiased"> <!-- x-data -->
    <div class=""> <!-- x-data="{ sidebar: true }" -->
        <div class="fixed left-0 top-0 right-0  bottom-0   bg-stone-700 duration-200 shadow z-10 w-0 lg:w-52">
            <!-- :class="sidebar ? 'w-12 lg:w-52' : 'w-0 lg:w-16'" -->
            @include('layouts.sidebar')
        </div>

        <div class="ml-0 lg:ml-52 min-h-screen bg-stone-100  duration-200">
            <!--:class="sidebar?'ml-12 lg:ml-0 lg:left-52 lg:right-0':'ml-0 lg:ml-16'" -->
            <div class="fixed top-0 right-0 left-0 h-full lg:left-52 z-20">

                @include('layouts.navigation')
            </div>

            <!-- Page Content -->
            <main class="mt-8 lg:mt-12 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 4000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @elseif (Session::has('warning'))
                toastr.warning('{{ Session::get('warning') }}');
            @endif
        });
    </script>
</body>

</html>
