@extends('layouts.layout')
@section('content')
    @auth()
        <div class="logo">Личный кабинет</div>
        <div><strong>ваши данные</strong></div>
        <div class="post">
            <div class="body"><strong>Логин:</strong> {{$user->login}}</div>
            <div class="body">
                <strong>Пол:</strong>
                @foreach($genders as $gender)
                    @if($gender->id == Auth::user()->gender_id)
                        {{$gender->name}}
                    @endif
                @endforeach
            </div>
        </div>
    @endauth
@endsection
