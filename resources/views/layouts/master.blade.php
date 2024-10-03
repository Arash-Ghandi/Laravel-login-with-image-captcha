<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head-tag')
    @yield('style')
    <title>
        @yield('title')
    </title>
</head>
<body>
    <div class="spinner-wrap" id="spiner_loader" style="display: block; opacity: 1;">
        <div class="spinner-circle"><span class="spinner-bar"></span>
        </div>
    </div>

    <section class="body-container">

        <section id="main-body" class="main-body">
            @yield('content')
        </section>

    </section>

    @include('layouts.script')
    @yield('script')

</body>
</html>
