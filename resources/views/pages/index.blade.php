{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Главная')
{{-- Sedtion content --}}
@section('content')
    <section class="catalog">
        <ul class="catalog__list">
            @foreach ($products as $product)
            <li>
                <a href="{{ route('detail', $product->id) }}" class="catalog__link">
                    <img class="catalog__img" src="{{ asset('img/' . $product->img) }}" alt="">
                    <h3 class="catalog__title">{{ $product->name }}</h3>
                    <p class="catalog__price">{{ $product->price }}₽</p>
                </a>
            </li>
            @endforeach
        </ul>
    </section>
@endsection
