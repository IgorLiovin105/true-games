{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Заказ детально')
{{-- Sedtion content --}}
@section('content')
    <section class="repair">
        <h1 class="repair__title">Заказ номер {{ $repairNumber->id }}</h1>
        <h2 class="repair__subtitle">Финальная цена: {{ $repairNumber->price }}₽</h2>
        <h2 class="repair__subtitle">Статус данного заказа: {{ $repairNumber->status }}</h2>
        <ul class="repair__list">
            @foreach($repairItems as $item)
                <li>
                    <a href="{{ route('detail', $item->product->id) }}" class="repair__item">
                        <img src="{{ asset('img/' . $item->product->img) }}" alt="">
                        <h2>{{ $item->product->name }}</h2>
                        <p>Количество: {{ $item->quantity }}</p>
                        <p>Цена: {{ $item->summary_price }}₽</p>
                    </a>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('cancelRepair', $repairNumber->id) }}">Отменить заказ</a>
    </section>
@endsection
