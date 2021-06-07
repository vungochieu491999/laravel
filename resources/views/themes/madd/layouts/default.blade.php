<!DOCTYPE html>
<html lang="en">
<head>
    @include('Theme::layouts.partials.head',['title' => "Home Madd"])
</head>

<body class="body-wrapper">

<section>
    @include('Theme::layouts.partials.nav')
</section>


@yield('content')

<!--============================
=            Footer            =
=============================-->

@include('Theme::layouts.partials.footer')

<!-- JAVASCRIPTS -->
<script src="{{ asset('themes/madd/plugins/jQuery/jquery.min.js') }}"></script>
<script src="{{ asset('themes/madd/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('themes/madd/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/madd/plugins/bootstrap/js/bootstrap-slider.js') }}"></script>
<!-- tether js -->
<script src="{{ asset('themes/madd/plugins/tether/js/tether.min.js') }}"></script>
<script src="{{ asset('themes/madd/plugins/raty/jquery.raty-fa.js') }}"></script>
<script src="{{ asset('themes/madd/plugins/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ asset('themes/madd/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('themes/madd/plugins/fancybox/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('themes/madd/plugins/smoothscroll/SmoothScroll.min.js') }}"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="{{ asset('themes/madd/plugins/google-map/gmap.js') }}"></script>
<script src="{{ asset('themes/madd/js/script.js') }}"></script>

@yield('scripts')

</body>
</html>



