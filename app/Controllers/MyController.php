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

    public function calculate()
    {
        $calculatorService = Services::calculatorService();

        $numbers = [10, 5, 2];
        $operator = '+';

        $result = $calculatorService->calculate($numbers, $operator);

        echo "Result: $result";
    }
}
