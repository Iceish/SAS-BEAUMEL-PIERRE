<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.B.P @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('head')
</head>
<body id="@yield('title')">
    @yield('body')

    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
        if(Cookies.getCookie('cookies') !== 'true'){
            Swal.fire({
                toast: true,
                position: 'bottom-end',
                title: 'Cookies Privacy Policy.',
                text: "{{ __('messages.cookies.message') }}",
                imageUrl: '{{ asset('img/cookie.png') }}',
                imageWidth: 100,
                imageHeight: 100,
                imageAlt: 'Cookie image',
                confirmButtonColor: getComputedStyle(document.body).getPropertyValue('--primary'),
                confirmButtonText: '{{ __('word.accept') }} !',
            }).then((result) => {
                if (result.isConfirmed) {
                    Cookies.setCookie('cookies','true',30);
                }
            });

        }
    </script>

    @stack('js')
</body>
</html>
