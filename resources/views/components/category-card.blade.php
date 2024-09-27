@props(['data'])
<div class="col-6 col-sm-4 col-lg-2">
    <a href="category.html" class="cat-block">
        <figure>
            <span>
                <img src="{{ url('storage', $data->img) }}" alt="Изображение категории {{ $data->name }}">
            </span>
        </figure>

        <h3 class="cat-block-title">{{ $data->name }}</h3><!-- End .cat-block-title -->
    </a>
</div><!-- End .col-sm-4 col-lg-2 -->