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
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            <input type="file" name="img">
            <input type="text" name="country">
            <input type="text" name="model">
            <input type="text" name="year">
            <input type="number" name="price">
            <input type="number" name="quantity">
            <input type="number" name="category_id">
            <button>Опубликовать товар</button>
        </form>
    </section>
@endsection
