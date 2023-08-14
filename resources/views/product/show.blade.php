@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

@php
$name = $viewData["product"]["name"];
$description = $viewData["product"]["description"];
$price = $viewData["product"]["price"];
@endphp

<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                @if ($price < 100) <h5 class="card-title">{{ $name }}</h5>
                    @else <h5 class="card-title" style="color: red;">{{ $name }}</h5>
                    @endif
                    <p class="card-text">{{ $description }}</p>
                    <p class="card-text">$ {{ $price }}</p>
            </div>
        </div>
    </div>
</div>
@endsection