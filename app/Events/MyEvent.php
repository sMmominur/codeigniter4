<?php
namespace App\Events;

use CodeIgniter\Events\Events;

class MyEvent
{
    public static function myEventTrigger($data)
    {
        Events::trigger('myEvent', $data);
    }
}
