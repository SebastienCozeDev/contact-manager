<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact Manager - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="icon" href="/img/main-logo.png">
</head>
<body>
    @include('header')
    <main id="main" role="main">
        @yield('main')
    </main>
    @include('footer')
</body>
@include('scripts')
</html>