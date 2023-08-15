@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="text-center">
    <p>
        The product {{ $viewData["name"] }} has been created.
    </p>
    <p>
        The price is $ {{ $viewData["price"] }}.
    </p>
</div>
@endsection