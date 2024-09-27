@extends('layout.master')
@section('title', $title)
@section('keywords', $keywords)
@section('description', $description)

@section('content')
<div class="container">
   <h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->
   
   <div class="cat-blocks-container">
        <livewire:category.category-list />
   </div><!-- End .cat-blocks-container -->
</div><!-- End .container -->
@endsection