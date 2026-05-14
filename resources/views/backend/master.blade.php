<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false }">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
@include('backend.includes.style')
</head>

<body class="flex min-h-screen">

@include('backend.includes.sidebar')

<!-- MAIN -->
<main class="flex-1 p-5 lg:p-10">

@include('backend.includes.navbar')

@yield('content')
  
    </main>

</body>
@include('backend.includes.script')
    @stack('script')
</html>
