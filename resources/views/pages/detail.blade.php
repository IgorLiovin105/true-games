{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', $product->name)
{{-- Sedtion content --}}
@section('content')
    <section class="detail">
        <div class="detail__content">
            <img src="{{ asset('img/' . $product->img) }}" alt="" class="detail__img">
            <div class="detail__info">
                <h2 class="detail__title">{{ $product->name }}</h2>
                <p class="detail__description">{{ $product->description }}</p>
                <p class="detail__setting">Модель - {{ $product->model }}</p>
                <p class="detail__setting">Страна производства - {{ $product->country }}</p>
                <p class="detail__setting">Год производства - {{ $product->year }}</p>
                <p class="detail__setting">Цена - {{ $product->price }}₽</p>
                <p class="detail__setting">Количество - <span id="product-quantity">{{ $product->quantity }}</span></p>
                <p id="response" style="display: none"></p>
                @guest
                    <a href="{{ route('login') }}" class="detail__login">Чтобы добавить товар в коризну необходимо войти в профиль</a>
                @endguest
                @auth
                <form id="add-to-cart" action="">
                    @if($product->quantity < 1)
                        <p>Данного товара нет в наличии</p>
                    @else
                        <button id="add-to-cart-button" data-id="{{ $product->id }}" class="detail__cart" type="submit">Добавить в корзину</button>
                    @endif
                </form>
                @endauth
            </div>
        </div>
    </section>
    <script src="{{ asset('/js/cart.js') }}"></script>
@endsection
