<?php

namespace App\Traits;

trait MyTrait
{
    public function greet()
    {
        return 'Hello, trait!';
    }

    public function logMessage($message)
    {
        // Log the provided message
        // ...
    }
}
