<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../resources/css/app.css">
    <script type="text/javascript" src="../resources/js/js.js"></script>
    @yield('head')
    <title>Document</title>
</head>
<body>
<header>
    <div class="logo">
        <a href="{{route('/')}}">ЖКХ ЖИЛИЩНИК</a>
    </div>
    <div class="right-nav">
        @guest()
            <a href="{{route('auth')}}">войти</a>
            <a href="{{route('reg')}}">регистрация</a>
        @endguest
        @auth()
            @yield('addpost')

            @if(Auth::user()->isAdmin==1)
                <a href="{{route('admin')}}">админ</a>
            @endif
            @if(Auth::user()->isAdmin!=1)
                <a href="{{route('lk')}}">личный кабинет</a>
            @endif
            <a href="{{route('logout')}}">выйти</a>
        @endauth
    </div>
</header>
<section id="content-section">
    <div class="content">
        @yield('main')
        <div class="content_wrap" id="content_wrap">

            @yield('content')
        </div>
        <div id="dialog">
            <div>
                <div class="logo">Создание поста</div>
                <form method="post" class="form" id="postForm" enctype="multipart/form-data">
                    @csrf
                    <div class="wrapper">
                        @error('header')
                        <p>
                            {{$message}}
                        </p>
                        @enderror
                        <div>заголовок</div>
                        <input type="text" name="header" value="124" class="form-title" placeholder="заголовок" id="header">
                    </div>
                    <div class="wrapper">
                        @error('body')
                        <p>
                            {{$message}}
                        </p>
                        @enderror
                        <div>текст</div>
                        <textarea name="body" placeholder="текст" class="form-text" id="body">5253</textarea>
                    </div>
                    <div class="wrapper">
                        @error('image')
                        <p>
                            {{$message}}
                        </p>
                        @enderror
                        <div>изображение</div>
                        <input type="file" name="image" class="form-photo" id="image">
                    </div>
                    <div class="wrapper">
                        <div class="button" id="accept_post">Добавить</div>
                        <div class="button" id="cancel_post">Отмена</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
