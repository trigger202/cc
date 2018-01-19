
<!doctype html>
<html>
<head>
    @include('includes.head')
    @yield('assets')

   @stack('headScripts')
</head>
<body>
		@include('includes.header')

<div class="container">


    <div id="main" class="wrapper">

           @yield('content')

    </div>

    <div class="footer footer-fixed-bottom">
		@include('includes.footer')
    </div>
</div>


</body>
</html>
