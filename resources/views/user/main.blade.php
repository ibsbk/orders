@extends('layouts.layout')
@section('addpost')
    <div id="addpost">добавить пост</div>
@endsection
@section('main')
    <div class="logo">Главная</div>
@endsection
@section('content')
    @guest()
        <div class="logo">Зарегистрируйтесь или авторизируйтесь</div>
    @endguest
    @auth()
        @foreach($posts as $post)
            @if($post->user_id == Auth::user()->id)
                <div class="post">
                    <div class="header">
                        {{$post->header}}
                    </div>
                    <div class="body">
                        {{$post->body}}
                    </div>
                    <div class="body">
                        <i>{{$post->status}}</i>
                    </div>
                    <div class="image">
                        <img class="img" src="../../storage/app/public/{{$post->image}}">
                    </div>
                    <div class="actions">
                        @if($post->status == 'на рассмотрение')
                            <div><a href="{{('deletePost/'.$post->id)}}">удалить</a></div>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    @endauth
@endsection
