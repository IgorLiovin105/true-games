{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Коризна')
{{-- Sedtion content --}}
@section('content')
    <section class="cart">
        <div class="cart__content">
            <button class="cart__repair" type="submit">Оформить заказ на {{ $finalPrice }}₽</button>
            @foreach ($cartItems as $item)
                <div class="cart__item">
                    <img src="{{ asset('img/' . $item->product->img) }}" alt="">
                    <h2>{{ $item->product->name }}</h2>
                    <p>{{ $item->product->price }}₽</p>
                    <div class="cart__buttons">
                        <form id="deleteFromCart">
                            @csrf
                            <button class="cart__delete" type="submit" data-id="{{ $item->product->id }}">Удалить товар</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
