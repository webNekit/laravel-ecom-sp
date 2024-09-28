<div>
    @forelse ($products as $product)
        {{ $product->name }}
    @empty
        <p>Товары не найдены</p>
    @endforelse
</div>
