<?php

namespace App\Models;

use PDO;

class Category
{
    // Pull categories 
    public function allCategory()
    {
        $select = "SELECT id, name FROM categories ORDER BY id DESC";
        try {
            $stm = DBConnect()->prepare($select);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {

            $this->sessionCreate('message', 'error', 'Something wrong!');
            return redirect('/categories');
        }
    }

    // Pull sub categories 
    public function allSubCategory()
    {
        $select = "SELECT id, category_id, name FROM sub_categories ORDER BY name";

        try {

            $stm = DBConnect()->prepare($select);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);

        } catch (\Throwable $th) {
            $this->sessionCreate('message', 'error', 'Something wrong!');
            return redirect('/categories');
        }
    }

    // Pull category by id 
    public function getCategory($id)
    {
        $select = "SELECT id, name FROM categories WHERE id=?";

        try {

            $stm = DBConnect()->prepare($select);
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (\Throwable $th) {
            $this->sessionCreate('message', 'error', 'Something wrong!');
            return redirect('/categories');
        }
    }

    // Store category 
    public function storeCategory($data)
    {
        $insert = sprintf(
            "INSERT INTO %s (%s) VALUES(%s)",
            "categories",
            implode(", ", array_keys($data)),
            ":" . implode(", :", array_keys($data))
        );

        try {
            
            $stm = DBConnect()->prepare($insert);
            $stm->execute($data);

        } catch (\Throwable $th) {

            $this->sessionCreate('message', 'error', 'Something wrong!');
            return redirect('/categories');
        }
    }

    // Store sub category 
    public function subCatStore($category_id, $name)
    {            
            $name['category_id'] = $category_id;
            
            $insert = sprintf(
                "INSERT INTO %s (%s) VALUES(%s)",
                "sub_categories",
                implode(', ', array_keys($name)),
                ":".implode(', :', array_keys($name))
            );

            try {

                $stm = DBConnect()->prepare($insert);
                $stm->execute($name);

            } catch (\Throwable $th) {
                $this->sessionCreate('message', 'error', 'Something wrong!');
                return redirect('/sub-categories');
            }

    }

    // Update category 
    public function updateCategory($values)
    {
        $update = "UPDATE categories 
                SET name=:name 
                WHERE id=:id";
        try {

            $stm = DBConnect()->prepare($update);
            $stm->execute($values);

        } catch (\Throwable $th) {
            $this->sessionCreate('message', 'error', 'Something wrong!');
            return redirect('/categories');
        }
    }

    // Delete category 
    public  function destroyCategory($id)
    {
        $delete = "DELETE FROM categories WHERE id=?";

        try {

            $stm = DBConnect()->prepare($delete);
            $stm->execute([$id]);

        } catch (\Throwable $th) {
            $this->sessionCreate('message', 'error', 'Something wrong!');
            return redirect('/categories');
        }
    }

    // Delete sub category 
    public function deleteSubCat($id)
    {
        $delete = "DELETE FROM sub_categories WHERE id=?";

        try {

            $stm = DBConnect()->prepare($delete);
            $stm->execute([$id]);

        } catch (\Throwable $th) {
            $this->sessionCreate('message', 'error', 'Something wrong!');
            return redirect('/sub-categories');
        }
    }

    // Pull category by name 
    public function uniqueCheck($name)
    {
        $select = "SELECT name FROM categories WHERE name=?";

        try {
            $stm = DBConnect()->prepare($select);
            $stm->execute([$name]);
            return $stm->fetch(PDO::FETCH_COLUMN);
        } catch (\Throwable $th) {
            sessionStart();
            sessionSet('error', $th->getMessage());
            return;
        }
    }
    
    private function sessionCreate($message, $name, $text)
    {
        sessionStart();
        sessionUnset($message);
        sessionSet($name, $text);
    }
}
