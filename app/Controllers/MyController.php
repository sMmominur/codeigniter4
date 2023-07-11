<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;

class MyController extends BaseController
{
    public function index()
    {
        $myService = Services::myService();

        $result = $myService->doSomething();

        echo $result;
    }
}
