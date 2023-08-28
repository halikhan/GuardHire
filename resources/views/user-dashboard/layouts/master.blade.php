<!DOCTYPE html>
<html lang="en">

<head>
    @include('user-dashboard.layouts.header')
</head>

<body>
    <div>
        {{-- navbar --}}
        @include('user-dashboard.layouts.navbar')

        <section class="mt7">
            @include('user-dashboard.layouts.sidebar')

            @yield('content')
        </section>
        @include('user-dashboard.layouts.footer')
    </div>
    @include('user-dashboard.layouts.footer-scripts')
</body>

</html>
