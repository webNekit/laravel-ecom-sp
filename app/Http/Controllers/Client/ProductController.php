<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        return view('pages.products', [
            'title' => 'Товары',
            'description' => 'Meta-описание для страницы товары',
            'keywords' => 'Товары по выгодным ценам, скидки, рассрочка',
            'id' => $id,
        ]);
    }
    public function show(Product $product)
    {
        return view('pages.single-product', [
            'product' => $product,
        ]);
    }
}
