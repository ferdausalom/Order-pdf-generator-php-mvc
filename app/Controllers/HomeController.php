<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\CatProd;
use App\Models\Product;

class HomeController
{
    // Load all products and show in the front 
    public function index()
    {
        $allProducts = (new Product)->allProduct();

        return view('front/index', [
            'allProducts' => $allProducts
        ]);
    }

    // Show product details and categories 
    public function show()
    {
        $id = Request::values()['id'];

        $product = (new Product)->getProduct($id);

        $cats = (new CatProd)->cats($id);

        return view('front/productShow', [
            'product' => $product,
            'cats' => $cats
        ]);
    }
}