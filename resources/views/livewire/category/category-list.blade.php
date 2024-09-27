<div class="row">
    @foreach ($categories as $category)
        <x-category-card :data="$category" />
    @endforeach
</div><!-- End .row -->