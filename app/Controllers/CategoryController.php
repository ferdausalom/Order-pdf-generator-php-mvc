<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Category;
use App\Validations\CategoryValidation;

class CategoryController
{
    // Load categories and show in the Front 
    public function index()
    {
        $categories = (new Category)->allCategory();
        return view("categoryIndex", [
            "categories" => $categories
        ]);
    }

    // Show create category form 
    public function create()
    {
        return view("categoryCreate");
    }

    // Store category 
    public function store()
    {
        $name = Request::values()['name'] ?? '';

        // Empty check 
        if ($name === '') {
            $this->sessionCreate('message', 'error', 'Category can\'t be empty');
            return redirect('/categories/create');
        }

        // Unique check 
        $exist = (new Category)->uniqueCheck($name);
        if ($exist) {
            $this->sessionCreate('message', 'error', 'Category already exists!');
            return redirect('/categories/create');
        }

        // Validate category 
        $name = (new CategoryValidation)->validateCategory($name);

        // Store category 
        (new Category)->storeCategory($name);

        $this->sessionCreate('error', 'message', 'Category added successfully!');
        return redirect('/categories');
    }

    // Edit category 
    public function edit()
    {
        $id = Request::values()['id'];
        $category = (new Category)->getCategory($id);

        return view("categoryEdit", ['category' => $category]);
    }

    // Update category 
    public function update()
    {
        $id = Request::values()['id'];
        $name = Request::values()['name'] ?? '';

        // Empty check 
        if ($name === '') {
            $this->sessionCreate('message', 'error', 'Category can\'t be empty');
            return redirect('/categories/edit/?id=' . $id);
        }

        $exist = (new Category)->uniqueCheck($name);
        if ($exist) {
            $this->sessionCreate('message', 'error', 'Category already exists!');
            return redirect('/categories/edit/?id=' . $id);
        }

        // Validate category 
        $values = (new CategoryValidation)->validateCategory($name);
        $values['id'] = $id;

        // Update category and trigger message 
        (new Category)->updateCategory($values);

        $this->sessionCreate('error', 'message', 'Category updated successfully!');
        return redirect('/categories');
    }

    // Destory category 
    public function destroy()
    {
        $id = Request::values()['id'] ?? '';

        if ($id === '') {
            $this->sessionCreate('message', 'error', 'Something wrong!');
            return redirect('/categories');
        }

        (new Category)->destroyCategory($id);

        $this->sessionCreate('error', 'message', 'Category deleted successfully!');
        return redirect('/categories');
    }

    private function sessionCreate($message, $name, $text)
    {
        sessionStart();
        sessionUnset($message);
        sessionSet($name, $text);
    }
}
