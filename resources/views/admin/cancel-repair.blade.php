{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Отмена заказа')
{{-- Sedtion content --}}
@section('content')
    <section class="cancel">
        <div class="canter__content">
            <h1>Удаление заказа {{ $repair->id }}</h1>
            <form method="POST" action="{{ route('cancelRepairProcess') }}" class="reason">
                @csrf
                <input type="text" name="reason">
                <input type="hidden" name="id" value="{{ $repair->id }}">
                <button type="submit">Отменить заказ</button>
            </form>
        </div>
    </section>
@endsection
