@props(['data'])
<div>
    <h1>{{ $data->title }}</h1>
    <a href="{{ route('page.single-article', $data->slug) }}">Подробнее</a><!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</div>