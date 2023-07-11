<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class CountryFilter implements FilterInterface
{
    
    public function before(RequestInterface $request, $arguments = null)
    {
        $logger = Services::logger();

        $logger->info('Information message');
       
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Your filter logic
    }
    
}
