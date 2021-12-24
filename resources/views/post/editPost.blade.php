@extends('layouts.layout')
@section('content')
    @auth()
        <div class="logo">Редактирование поста</div>
        <form method="post" class="form" enctype="multipart/form-data">
            @csrf
            <div class="wrapper">
                @error('header')
                <p>
                    {{$message}}
                </p>
                @enderror
                <div>заголовок</div>
                <input type="text" name="header" value="{{$post->header}}" placeholder="заголовок">
            </div>
            <div class="wrapper">
                @error('body')
                <p>
                    {{$message}}
                </p>
                @enderror
                <div>текст</div>
                <textarea name="body" placeholder="текст">{{$post->body}}</textarea>
            </div>
            <div class="wrapper">
                @error('status')
                <p>
                    {{$message}}
                </p>
                @enderror
                <div>статус</div>
                <select name="status">
                    <option value="на рассмотрение">на рассмотрение</option>
                    <option value="выполняется">выполняется</option>
                    <option value="законченно">законченно</option>
                    <option value="отмененно">отмененно</option>
                </select>
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
    @endauth
@endsection
