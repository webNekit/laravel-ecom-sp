@props(['data'])
<div class="col-6 col-md-4 col-lg-3">
    <div class="product product-2">
        <figure class="product-media">
            @if ($data->sale > 0)
                <span class="product-label label-circle label-sale">Скидка</span>
            @endif

            <a href="product.html">
                <img src="{{ url('storage', $data->img) }}" alt="Product image" class="product-image" />
            </a>

            <div class="product-action-vertical">
                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
            </div>
            <div class="product-action">
                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>Добавить в корзину</span></a>
                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>Сравнить</span></a>
            </div>
        </figure>

        <div class="product-body">
            <div class="product-cat">
                <a href="{{ route('page.products', $data->category_id) }}">{{ $data->category->name }}</a>
            </div>
            <!-- End .product-cat -->
            <h3 class="product-title"><a href="product.html">{{ $data->name }}</a></h3>
            <!-- End .product-title -->
            <div class="product-price">
                @if ($data->sale > 0)
                    <span class="new-price">{{ $data->sale }}</span>
                @endif
                <span class="old-price">{{ $data->price }}</span>
            </div>
            <!-- End .product-price -->
            <div class="ratings-container">
                <div class="ratings">
                    <div class="ratings-val" style="width: 40%;"></div>
                    <!-- End .ratings-val -->
                </div>
            </div>
        </div>
    </div>

</div>