<?php

namespace App\Validations;

class ProductValidation
{
    // Validate product 
    public function validateProduct($values)
    {
        $name = $price = $body = '';
        $name = $this->validateInput($values['name']);
        $price = $this->validateInput($values['price']);
        $body = $this->validateInput($values['body']);

        return [
            'name' => $name,
            'price' => $price * 100,
            'body' => $body
        ];
    }

    private function validateInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
