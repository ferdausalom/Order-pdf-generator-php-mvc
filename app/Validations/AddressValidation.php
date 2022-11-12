<?php

namespace App\Validations;

class AddressValidation
{
    // Validate address 
    public function validateAddress($values)
    {
        $clientIp = $username = $email = $phone = $city = $address = $back = '';

        $clientIp = $this->validateInput($values['clientIp']);
        $username = $this->validateInput($values['username']);
        $email = $this->validateInput($values['email']);
        $phone = $this->validateInput($values['phone']);
        $city = $this->validateInput($values['city']);
        $address = $this->validateInput($values['address']);     
        $back = $this->validateInput($values['destination']);     

        if ($email === '' || $phone === '' || $city === '' ||$address === '') {

            $this->sessionCreate('message', 'error', 'Fields can\'t be empty!');
            if ($back) {
                return back($back);
            }

        } elseif(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email))
        {
            $this->sessionCreate('message', 'error', 'Email not valid!');
            if ($back) {
                return back($back);
            }
        }

        // Return data after validation 
        return [
            'session_id' => $clientIp,
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'address' => $address
        ];
        
    } 

    private function validateInput($data)
    {
        $value = trim($data);
        $value = stripslashes($data);
        $value = htmlspecialchars($data);
        return $value;
    }

    private function sessionCreate($message, $name, $text)
    {
        sessionStart();
        sessionUnset($message);
        sessionSet($name, $text);
    }

}