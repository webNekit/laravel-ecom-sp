<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'title' => 'Главная',
            'description' => 'Meta-описание главной страницы',
            'keywords' => 'ИМ, Электронные товары, скидки',
        ]);
    }
}
