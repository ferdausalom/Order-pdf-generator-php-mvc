<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Category;
use App\Models\CatProd;
use App\Models\Product;
use App\Validations\ImageValidation;
use App\Validations\ProductValidation;

class ProductController
{
    // Load all products and  show in the front 
    public function index()
    {
        $products = (new Product)->allProduct();
        return view("productIndex", ['products' => $products]);
    }

    // Load and Show categories 
    public function create()
    {
        $categories = (new Category)->allCategory();
        return view("productCreate", ['categories' => $categories]);
    }

    // Store product 
    public function store()
    {
        $values = Request::values();
        $name = Request::values()['name'] ?? '';
        $price = Request::values()['price'] ?? '';
        $category_id = Request::values()['category_id'] ?? '';
        $file = Request::file()['thumbnail'];

        // Empty check 
        if ($name === '') {
            $this->sessionCreate('message', 'error', 'Name can\'t be empty');
            return redirect('/products/create');
        }

        // Empty check 
        if ($price === '') {
            $this->sessionCreate('message', 'error', 'Price can\'t be empty');
            return redirect('/products/create');
        }

        // Empty check 
        if ($category_id === '') {
            $this->sessionCreate('message', 'error', 'Category can\'t be empty');
            return redirect('/products/create');
        }

        // Validate products data 
        $data = (new ProductValidation)->validateProduct($values);

        if ($file !== '') {
            $thumbnail = (new ImageValidation)->validateImage($file);
            if ($thumbnail === 'overSize') {
                $this->sessionCreate('message', 'error', 'Max size is 500 KB.');
                return redirect('/products/create');
            }

            if ($thumbnail === 'unsupported') {
                $this->sessionCreate('message', 'error', 'We support JPG, JPEG, OR PNG only.');
                return redirect('/products/create');
            }

            if ($thumbnail === 'wrong') {
                $data['thumbnail'] = '';
            }

            $data['thumbnail'] = $thumbnail;
        }

        $lastProd_id = (new Product)->storeProduct($data);

        (new CatProd)->storeCatProd($lastProd_id, $category_id);

        $this->sessionCreate('error', 'message', 'Product added successfully!');
        return redirect('/products');
    }

    // Edit product 
    public function edit()
    {
        $id = Request::values()['id'];

        $categories = (new Category)->allCategory();
        $selectedCats = (new CatProd)->getCategories($id);
        $product = (new Product)->getProduct($id);

        return view("productEdit", [
            'product' => $product,
            'categories' => $categories,
            'selectedCats' => $selectedCats
        ]);
    }

    // Update product 
    public function update()
    {
        $values = Request::values();
        $id = Request::values()['id'];
        $name = Request::values()['name'] ?? '';
        $price = Request::values()['price'] ?? '';
        $category_id = Request::values()['category_id'] ?? '';
        $file = Request::file()['thumbnail'] ?? '';

        // Empty check 
        if ($name === '') {
            $this->sessionCreate('message', 'error', 'Name can\'t be empty');
            return redirect('/products/edit?id=' . $id);
        }

        // Empty check 
        if ($price === '') {
            $this->sessionCreate('message', 'error', 'Price can\'t be empty');
            return redirect('/products/edit?id=' . $id);
        }

        // Empty check 
        if ($category_id === '') {
            $this->sessionCreate('message', 'error', 'Category can\'t be empty');
            return redirect('/products/edit?id=' . $id);
        }

        $data = (new ProductValidation)->validateProduct($values);

        if ($file['tmp_name'] !== '') {

            $thumbnail = (new ImageValidation)->validateImage($file);

            if ($thumbnail === 'overSize') {
                $this->sessionCreate('message', 'error', 'Max size should be 500 KB.');
                return redirect('/products/edit?id=' . $id);
            }

            if ($thumbnail === 'unsupported') {
                $this->sessionCreate('message', 'error', 'We support JPG, JPEG, OR PNG only.');
                return redirect('/products/edit?id=' . $id);
            }

            $data['thumbnail'] = $thumbnail;
        }

        $data['id'] = $id;
        (new Product)->updateProduct($data);

        (new CatProd)->updateCatProd($id, $category_id);

        $this->sessionCreate('error', 'message', 'Product updated successfully!');
        return redirect('/products');
    }

    // Delete product 
    public function destroy()
    {
        (new Product)->destroyProd(Request::values()['id']);

        $this->sessionCreate('error', 'message', 'Product deleted successfully!');
        return redirect('/products');
    }

    private function sessionCreate($message, $name, $text)
    {
        sessionStart();
        sessionUnset($message);
        sessionSet($name, $text);
    }
}
