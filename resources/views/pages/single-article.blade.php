@extends('layout.master')
@section('title', $article->meta_title)
@section('description', $article->meta_description)
@section('keywords', $article->meta_keywords)
@section('content')
    {!! $article->content !!}
@endsection