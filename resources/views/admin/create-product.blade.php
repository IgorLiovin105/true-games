{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Создать товар')
{{-- Sedtion content --}}
@section('content')
    <section class="create">
        <form method="POST" action="{{ route('createProduct') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name">
            <input type="file" name="img">
            <input type="text" name="description">
            <input type="text" name="model">
            <input type="text" name="country">
            <input type="number" name="year">
            <input type="number" name="price">
            <input type="number" name="quantity">
            <input type="number" name="category_id">
            <button type="submit">Опубликовать товар</button>
        </form>
    </section>
@endsection
