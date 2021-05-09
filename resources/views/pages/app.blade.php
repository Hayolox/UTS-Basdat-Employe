<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TB BASDAT</title>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        @include('includes.links')
    </head>
    <body class="sb-nav-fixed">
        @include('includes.navbar')
        <div id="layoutSidenav">
            @include('includes.sidebar')
            @yield('content')
            @include('includes.footer')
            </div>
        </div>

       @include('includes.script')
       @include('sweetalert::alert')
       @stack('addon-script')
    </body>
</html>
