@extends('layout.master')
@section('title', $title)
@section('keywords', $keywords)
@section('description', $description)

@section('content')
    Наши статьи
    <livewire:articles.articles-list />
@endsection