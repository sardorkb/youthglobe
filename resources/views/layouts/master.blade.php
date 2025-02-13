<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

@include('layouts.head')

<body class="index-page bg-white">

    @include('layouts.header')
    
    @yield('main-content')
    
    @include('layouts.footer')

</body>
</html>