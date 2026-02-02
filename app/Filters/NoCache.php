<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoCache implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do nothing here
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tells the browser: "Do not store this page!"
        $response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0');
        $response->setHeader('Pragma', 'no-cache');
    }
}