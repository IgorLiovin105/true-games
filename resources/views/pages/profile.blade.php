{{-- Extending layouts app --}}
@extends('layouts.app')
{{-- Section title --}}
@section('title', 'Профиль')
{{-- Sedtion content --}}
@section('content')
    <h1>Привет {{ auth()->user()->name }}</h1>
@endsection
