<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- @if(request()->is('admin/*'))
        <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
    @endif --}}

</head>
<body>
    <header>
        <div class="header-panel">
            <div class="title">
                <h1>G30 a Bordo</h1>
            </div>
            <button class="btn">Area CS</button>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer content here -->
    </footer>
    <!-- Add your JS scripts here -->
</body>
</html>

