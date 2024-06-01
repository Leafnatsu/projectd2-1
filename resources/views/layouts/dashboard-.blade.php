<!DOCTYPE html>
<html>

<head>
    @include('include.dashbord.head')
</head>

<body>

    <header>
        @include('include.dashbord._navbar')
    </header>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div>
            @yield('content')

            @include('include.dashbord._footer')
        </div>
    </main>

</body>

</html>
