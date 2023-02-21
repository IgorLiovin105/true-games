{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Профиль')
{{-- Sedtion content --}}
@section('content')
    <section class="profile">
        <h1 class="profile__title">Привет {{ auth()->user()->name }}</h1>
        <div class="profile__list">
            @foreach($repairs as $repair)
                <div class="profile__item">
                    <h2>Ваш заказ под номером {{ $repair->id }} находится в статусе: {{ $repair->status }}</h2>
                    <a href="{{ route('repair', $repair->id) }}">Посмотреть заказ детально</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
