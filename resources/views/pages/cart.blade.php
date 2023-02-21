{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Коризна')
{{-- Sedtion content --}}
@section('content')
    <section class="cart">
        <div class="cart__content">
            @if($price > 0)
                <a href="{{ route('userCheck') }}" class="cart__repair" type="submit">Оформить заказ на {{ $price }}₽</a>
            @endif
            @forelse ($cartItems as $item)
                <div class="cart__item">
                    <img src="{{ asset('img/' . $item->product->img) }}" alt="">
                    <h2>{{ $item->product->name }}</h2>
                    <div class="cart__quantity">
                        <a href="{{ route('changeQuantity', ['id' => $item->id, 'method' => 'incr']) }}">+</a>
                        <p>{{ $item->quantity }}</p>
                        <a href="{{ route('changeQuantity', ['id' => $item->id, 'method' => 'decr']) }}">-</a>
                    </div>
                    <p>{{ $item->product->price }}₽</p>
                    <p>total: {{ $item->summary_price }}₽</p>
                    <a href="{{ route('deleteFromCart', $item->id) }}" class="cart__delete">Удалить товар</a>
                </div>
            @empty
                <h1 class="cart__empty">В корзине нет товаров</h1>
            @endforelse
        </div>
    </section>
@endsection
