<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false }">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('backend.agent-panel.include.style')
</head>

<body class="flex min-h-screen">

    @include('backend.agent-panel.include.sideber')

    <!-- MAIN -->
    <main class="flex-1 p-5 lg:p-10">

        @include('backend.agent-panel.include.navber')

        @yield('content')

    </main>

</body>
@include('backend.agent-panel.include.script')
@stack('script')

</html>
