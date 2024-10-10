@forelse ($articles as $article)
    <x-article-card :data="$article" />
@empty
    <h1>Записей нет</h1>
@endforelse