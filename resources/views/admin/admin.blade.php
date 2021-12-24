@extends('layouts.layout')
@section('addpost')
    <a href="{{route('addPost')}}">добавить пост</a>
@endsection
@section('content')
    @auth()
        <div class="logo">Все посты</div>
        <div>

            @foreach($posts as $post)
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
                            <div><a href="{{('deletePost/'.$post->id)}}">удалить</a></div>
                            <div><a href="{{('editPost/'.$post->id)}}">редактировать</a></div>
                        </div>
                    </div>
            @endforeach
        </div>
    @endauth
@endsection
