<?php

namespace App\Validations;

class CategoryValidation
{
    // Validate category 
    public function validateCategory($name)
    {
        return $this->validateInput($name);
    }

    private function validateInput($name)
    {
        $name = trim($name);
        $name = stripslashes($name);
        $name = htmlspecialchars($name);
        return [
            'name' => $name
        ];
    }
}
