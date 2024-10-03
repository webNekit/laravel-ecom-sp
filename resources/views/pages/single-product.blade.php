@extends('layout.master')
@section('title', $product->name)
@section('description', $product->description)
@section('keywords', $product->description)
@section('content')
    {{-- Вывод товара --}}
    {{ $product->name }}
@endsection