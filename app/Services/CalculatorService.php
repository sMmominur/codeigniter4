<?php

namespace App\Services;

use CodeIgniter\Config\BaseService;

class CalculatorService extends BaseService
{
    public function calculate($numbers, $operator)
    {
        $result = $numbers[0];

        for ($i = 1; $i < count($numbers); $i++) {
            switch ($operator) {
                case '+':
                    $result += $numbers[$i];
                    break;
                case '-':
                    $result -= $numbers[$i];
                    break;
                case '*':
                    $result *= $numbers[$i];
                    break;
                case '/':
                    if ($numbers[$i] != 0) {
                        $result /= $numbers[$i];
                    } else {
                        return 'Cannot divide by zero.';
                    }
                    break;
                default:
                    return 'Invalid operator.';
            }
        }

        return $result;
    }
}
