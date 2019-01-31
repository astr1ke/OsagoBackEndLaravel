<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Панель администратора Осаго 2019</title>
    <!-- Bootstrap -->
    @yield('css')
</head>

<body>
    @include('admin.layouts.header')

    <div class="container-fluid">
        <div class="row-fluid">
            @include('admin.layouts.leftMenu')
            @yield('content')
        </div>

        <hr>
        @extends('admin.layouts.footer')
    </div>


    @yield('js')
</body>

</html>
