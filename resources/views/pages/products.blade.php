@extends('layout.master')
@section('title', $title)
@section('keywords', $keywords)
@section('description', $description)

@section('content')
<div class="container for-you">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">{{ $title }}</h2>
        </div>
    </div>

    <livewire:products.products-list :category-id="$id" />
</div>
@endsection