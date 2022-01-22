<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.B.P @yield('title')</title>
    @include('web.layout.head.links')
    @include('web.layout.head.css')
    @include('web.layout.head.js')
</head>
<body>
    @include('web.layout.header')
    @include('web.layout.main')
    @include('web.layout.footer')
</body>
</html>
