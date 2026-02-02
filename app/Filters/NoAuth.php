<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check if the user is ALREADY logged in
        if ($session->get('isLoggedIn')) {
            
            // Optional: Check user type to redirect to the correct dashboard
            if ($session->get('user_type') == 0) {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/'); // Or user dashboard
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}