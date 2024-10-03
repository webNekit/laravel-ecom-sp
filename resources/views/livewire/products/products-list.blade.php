<div class="products">
    <div class="row justify-content-center">
        @forelse ($products as $product)
            <x-product-card :data="$product" />
        @empty
            {{ __('Товары не найдены') }}
        @endforelse
    </div>
</div>