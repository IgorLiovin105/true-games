{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Регистрация')
{{-- Sedtion content --}}
@section('content')
    <form class="form" method="POST" action="{{ route('registerProcess') }}">
        <input class="form__text" name="name" type="text" placeholder="Введите имя">
        @error('name')<p class="error">Это обязательное поле</p>@enderror
        <input class="form__text" name="surname" type="text" placeholder="Введите фамилию">
        @error('surname')<p class="error">Это обязательное поле</p>@enderror
        <input class="form__text" name="patronymic" type="text" placeholder="Введите отчество (необязательно)">
        <input class="form__text" name="login" type="text" placeholder="Введите логин">
        @error('login')<p class="error">Данный логин уже используется либо набран неправильно</p>@enderror
        <input class="form__text" name="email" type="email" placeholder="Введите e-mail адрес">
        @error('email')<p class="error">Данный e-mail уже используется либо набран неправильно</p>@enderror
        <input class="form__text" name="password" type="password" placeholder="Введите пароль">
        <input class="form__text" name="password_confirmation" type="password" placeholder="Подтвердите пароль">
        @error('password')<p class="error">Пароль должен быть не менее 6 символов и быть подтверждённым</p>@enderror
        <div class="rules">
            <label for="rules">Согласие на обработку персональных данных</label>
            <input name="rules" type="checkbox">
        </div>
        @error('rules')<p class="error">Нужно согласиться на обработку персональных данных</p>@enderror
        @csrf
        <button type="submit">Зарегистрироваться</button>
        <a class="form__redirect" href="{{ route('login') }}">Уже есть аккаунт?</a>
    </form>
@endsection
