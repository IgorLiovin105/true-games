{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Проверка пользователя')
{{-- Sedtion content --}}
@section('content')
    <form class="form" method="POST" action="{{ route('makeRepair') }}">
        <input class="form__text" name="login" type="text" placeholder="Введите логин">
        @error('login')<p class="error">Логин набран неправильно</p>@enderror
        <input class="form__text" name="password" type="password" placeholder="Введите пароль">
        @error('password')<p class="error">Пароль набран неправильно</p>@enderror
        @csrf
        <button type="submit">Войти</button>
    </form>
@endsection
