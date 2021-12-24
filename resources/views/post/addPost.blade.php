@extends('layouts.layout')
@section('content')
    <div>
        <div class="logo">Создание поста</div>
        <form method="post" class="form" enctype="multipart/form-data">
            @csrf
            <div class="wrapper">
                @error('header')
                <p>
                    {{$message}}
                </p>
                @enderror
                <div>заголовок</div>
                <input type="text" name="header" placeholder="заголовок">
            </div>
            <div class="wrapper">
                @error('body')
                <p>
                    {{$message}}
                </p>
                @enderror
                <div>текст</div>
                <textarea name="body" placeholder="текст"></textarea>
            </div>
            <div class="wrapper">
                @error('image')
                <p>
                    {{$message}}
                </p>
                @enderror
                <div>изображение</div>
                <input type="file" name="image">
            </div>
            <div class="wrapper">
                <button>Добавить</button>
            </div>
        </form>
    </div>
@endsection
