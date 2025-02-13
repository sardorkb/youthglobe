<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body>
    <main class="main" id="top">

        @include('admin.layouts.sidebar')

        @include('admin.layouts.header')

        <div class="content">

            @yield('main-content')

            @include('admin.layouts.footer')

        </div>

    </main>
    <script src="{{ asset('backend/vendors/popper/popper.min.js') }}"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="vendors/feather-icons/feather.min.js"></script>
    <script src="vendors/dayjs/dayjs.min.js"></script>
    <script src="assets/js/phoenix.js"></script>
    <script src="vendors/echarts/echarts.min.js"></script>
    <script src="vendors/leaflet/leaflet.js"></script>
    <script src="vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
    <script src="{{ asset('backend/js/ecommerce-dashboard.js') }}"></script>
</body>
</html>
