<!DOCTYPE html>
<html>
<head>
    @include('include.promote.head')
</head>
<body>
    <header>
        @include('include.promote.navigation')
    </header>

    <div>
        @yield('content')
    </div>

    <footer>
        @include('include.promote.footer')
    </footer>
</body>
</html>
