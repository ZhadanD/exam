<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title><?=$title?></title>
</head>
<body>
<header>
    <a class="text-decoration-none link-dark" href="{{ route('main') }}">
        <p class="fs-3 text-center mt-2">Нарушениям.Нет</p>
    </a>
    <p class="fs-4 text-center mt-1">Здравствуйте, {{ auth()->user()->login }}!</p>

    @if(auth()->user()->role === 'admin')
        <div class="text-center">
            <a href="{{ route('admin.statements.index') }}" class="fs-4 text-decoration-none link-dark">В админку</a>
        </div>
    @endif
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
