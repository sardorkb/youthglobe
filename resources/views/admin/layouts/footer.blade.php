<footer class="footer position-absolute">
    <div class="row g-0 justify-content-between align-items-center h-100">
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 mt-2 mt-sm-0 text-900">
                Youth Globe<span class="d-none d-sm-inline-block"></span><span
                    class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2025 &copy;<a class="mx-1"
                    href="https://kbgroup.uz">kbgroup.uz</a>
            </p>
        </div>
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-600">v0.0.1</p>
        </div>
    </div>
</footer>

<script>
    var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
    var navbarTop = document.querySelector('.navbar-top');
    if (navbarTopStyle === 'darker') {
        navbarTop.setAttribute('data-navbar-appearance', 'darker');
    }

    var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
    var navbarVertical = document.querySelector('.navbar-vertical');
    if (navbarVertical && navbarVerticalStyle === 'darker') {
        navbarVertical.setAttribute('data-navbar-appearance', 'darker');
    }
</script>
<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{ asset('backend/vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('backend/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('backend/vendors/is/is.min.js') }}"></script>
<script src="{{ asset('backend/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('backend/vendors/lodash/lodash.min.js') }}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{ asset('backend/vendors/list.js/list.min.js') }}"></script>
<script src="{{ asset('backend/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('backend/vendors/dayjs/dayjs.min.js') }}"></script>
<script src="{{ asset('backend/js/phoenix.js') }}"></script>
<script src="{{ asset('backend/vendors/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('backend/vendors/leaflet/leaflet.js') }}"></script>
<script src="{{ asset('backend/vendors/leaflet.markercluster/leaflet.markercluster.js') }}"></script>
<script src="{{ asset('backend/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}">
</script>
<script src="{{ asset('backend/js/ecommerce-dashboard.js') }}"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


@stack('scripts')

<script>
    setTimeout(function() {
        $('.alert').slideUp();
    }, 4000);
</script>
