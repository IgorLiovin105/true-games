{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Создать товар')
{{-- Sedtion content --}}
@section('content')
    <section class="create">
        <form class="create__form" method="POST" action="{{ route('createProduct') }}" enctype="multipart/form-data">
            @csrf
            <input class="create__form-text" type="text" name="name" placeholder="Enter name">
            <input type="file" name="img" placeholder="Load image">
            <input class="create__form-text" type="text" name="description" placeholder="Enter description">
            <input class="create__form-text" type="text" name="model" placeholder="Enter model">
            <input class="create__form-text" type="text" name="country" placeholder="Enter country">
            <input class="create__form-text" type="number" name="year" placeholder="Enter year">
            <input class="create__form-text" type="number" name="price" placeholder="Enter price">
            <input class="create__form-text" type="number" name="quantity" placeholder="Enter quantity">
            <select name="category_id" id="">
                <option value="">Выбрать категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">Опубликовать товар</button>
        </form>
    </section>
@endsection
