<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false }">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('backend.farmer-panel.include.style')
</head>

<body class="flex min-h-screen">

    @include('backend.farmer-panel.include.sidebar')

    <!-- MAIN -->
    <main class="flex-1 p-5 lg:p-10">

        @include('backend.farmer-panel.include.navber')

        @yield('content')

    </main>

</body>
@include('backend.farmer-panel.include.script')
@stack('script')

</html>
