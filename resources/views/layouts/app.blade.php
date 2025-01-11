<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Bootstrap Css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('css') }}/select2.min.css">
    <link rel="stylesheet" href="{{ asset('css') }}/main.css">

</head>
<body>
    <div id="app">
        
        <!-- Navbar  -->
        @include('includes._navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Jquery  -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap js  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Sweet alert -->
    <script src="{{ asset('') }}/js/sweetalert.min.js"></script>
    <script src="{{ asset('js') }}/main.js"></script>

    <script>
        $(document).ready(function() {

            // SELECT 2 .
            $('.select2').select2();

            // Success Message ...
            @if( session()->has('success') )
                swal({
                    title: "{{ session()->get("success") }}",
                    icon: "success",
                    button : "Ok"
                });
            @endif

            // Error Message ...
            @if( session()->has('error') )
                swal({
                    title: "{{ session()->get("error") }}",
                    icon: "error",
                    button : "Ok"
                });
            @endif

            // Warning Message ...
            @if( session()->has('warning') )
                swal({
                    title: "{{ session()->get("warning") }}",
                    icon: "warning",
                    button : "Ok"
                });
            @endif

            // Confirm Delete .... ??!
            $(document).on('click' , '.delete' ,function(e){

                e.preventDefault();

                var that = $(this);

                swal({
                    title: "Confirm Delete",
                    icon: "error",
                    buttons: ["No", "Yes"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                        that.closest('form').submit();
                    }
                });

            });

        });
    </script>

    <!-- Select2 -->
    <script src="{{ asset('js') }}/select2.full.min.js"></script>
</body>
</html>
