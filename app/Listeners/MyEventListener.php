<?php
namespace App\Listeners;

class MyEventListener
{
    public function myEventCallback($data)
    {
        // Handle the event data
        // ...
        echo 'Event callback triggered with data: ' . $data;
    }
}
