<?php

namespace App\Services;

class InternetService
{
    public function isInternetConnected()
    {
        $connected = @fsockopen("www.google.com", 80);
        if ($connected) {
            fclose($connected);
            return true;
        }
        return false;
    }
}
