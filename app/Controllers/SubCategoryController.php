<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Category;
use App\Validations\CategoryValidation;

class SubCategoryController
{
    // Load categories and sub categories and show in front
    public function index()
    {
        $categories = (new Category)->allCategory();
        $allSubCategory = (new Category)->allSubCategory();

        return view("subCategoryIndex", [
            'categories' => $categories,
            'allSubCategory' => $allSubCategory
        ]);
    }

    // Load categories and show sub category form 
    public function create()
    {
        $categories = (new Category)->allCategory();
        return view("subCategoryCreate", ['categories' => $categories]);
    }

    // Store sub category 
    public function store()
    {
        $category_id = Request::values()['category_id'] ?? '';
        $name = Request::values()['name'] ?? '';
        
        if ($category_id === '') {
            $this->sessionCreate('message', 'error', 'Select category first!');
            return redirect('/sub-categories/create');
        }

        // Empty check 
        if ($name === '') {
            $this->sessionCreate('message', 'error', 'Sub Category can\'t be empty');
            return redirect('/sub-categories/create');
        }

        // Unique check 
        $exist = (new Category)->uniqueCheck($name);
        if ($exist) {
            $this->sessionCreate('message', 'error', 'Category already exists!');
            return redirect('/sub-categories/create');
        }
        
        // Validate sub category 
        $name = (new CategoryValidation)->validateCategory($name);

        // Store sub category and trigger message 
        (new Category)->subCatStore($category_id, $name);

        $this->sessionCreate('error', 'message', 'Sub Category added successfully!');
        return redirect('/sub-categories');
    }

    // Delete sub category 
    public function destroy()
    {
        $id = Request::values();

        (new Category)->deleteSubCat($id['id']);

        $this->sessionCreate('error', 'message', 'Sub Category deleted successfully!');
        return redirect('/sub-categories');
    }

    private function sessionCreate($message, $name, $text)
    {
        sessionStart();
        sessionUnset($message);
        sessionSet($name, $text);
    }
}