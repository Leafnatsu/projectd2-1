<!DOCTYPE html>
<html>
<head>
    @include('include.admin.head')
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
        @include('include.admin.sidebar')

        <div class="layout-page">

        @include('include.admin.header')




        @yield('content')

        @include('include.admin.footer')
    </div>
    </div>
    </div>




</body>
</html>
