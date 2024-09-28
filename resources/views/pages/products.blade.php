@extends('layout.master')
@section('title', $title)
@section('keywords', $keywords)
@section('description', $description)

@section('content')
    <livewire:products.products-list :category-id="$id" />
@endsection