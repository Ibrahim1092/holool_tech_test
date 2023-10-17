<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {{-- <link rel="stylesheet" href="style/css/login.min.css" /> --}}
        <link rel="stylesheet" href="{{ URL::asset('style/css/holooltech.css')}}" />
        <link rel="stylesheet" href="{{ URL::asset('style/bootstrap-5.3.2-dist/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
    <body>
        @yield('content2')

        {{-- <script src="style/js/holooltech.min.js" defer></script> --}}
        <script href="{{URL::asset('style/bootstrap-5.3.2-dist/js/bootstrap.min.js')}}"></script>
        {{-- <script href="{{URL::asset('style/js/holooltech.min.js')}}" defer></script> --}}
        {{-- <script src="style/js/holooltech.min.js" defer></script> --}}
        <script type="text/javascript" src="{{ asset('style/js/holooltech.js') }}"></script>
    </body>
</html>
