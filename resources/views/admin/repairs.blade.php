{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Заказы')
{{-- Sedtion content --}}
@section('content')
    <section class="canceled-repair">
        <h1 class="canceled-repair__title">Заказы</h1>
        <div class="canceled-repair__list">
            @foreach($repairs as $repair)
                <div class="canceled-repair__item">
                    <h2>Заказ номер {{ $repair->id }} находится в статусе: {{ $repair->status }}</h2>
                    <p>Дата-время создания: {{ $repair->created_at }}</p>
                    <p>Дата-время изменения: {{ $repair->updated_at }}</p>
                    <p>Имя пользователя: {{ $repair->user->name }}</p>
                    @if($repair->status == 'Ждёт отмены')
                        <a href="{{ route('cancelRepairPage', $repair->id) }}">Отменить заказ</a>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endsection
