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
        <p class="fs-3 text-center mt-2">Нарушениям.Нет</p>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
