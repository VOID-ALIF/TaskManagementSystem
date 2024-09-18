<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles and Scripts (add Vite or other as needed) -->
</head>
<body class="antialiased">
    <!-- Header Section -->
    <header>
        {{ $header }}
    </header>

    <!-- Main Content Slot -->
    <main>
        {{ $slot }}
    </main>
</body>
</html>
