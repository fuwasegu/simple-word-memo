<DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')｜シンプルなメモアプリ</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('pageCss')
    </head>
    <body>
        <div class="flex flex-col h-screen justify-between">
            <header>
                @yield('header')
            </header>
            <main class="mb-auto">
                @yield('content')
            </main>
            <footer class="h-10 bg-blue-500">
                @yield('footer')
            </footer>
        </div>
    </body>
</html>
