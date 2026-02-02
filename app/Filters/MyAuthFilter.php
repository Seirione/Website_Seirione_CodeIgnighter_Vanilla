<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MyAuthFilter implements FilterInterface
{
    // --------------------------------------------------------------------
    // LOGIC MUST GO HERE (BEFORE the controller loads)
    // --------------------------------------------------------------------
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // 1. Check if user is logged in at all
      
        if (! $session->get('isLoggedIn')) {
            return redirect()->to('/auth/login')->with('error', 'Please log in first.');
        }

        // 2. Check if the user_type is NOT 1 (Not an Admin)
        if ($session->get('user_type') != 1) {
            // Option A: Redirect to a regular user homepage
            return redirect()->to('/'); 
            
            // Option B: Show an "Access Denied" error
            // return redirect()->back()->with('error', 'You do not have permission to access that page.');
        }
        
        // If they pass both checks, CodeIgniter automatically lets them proceed.
    }

    // --------------------------------------------------------------------
    // Leave this empty for authorization checks
    // --------------------------------------------------------------------
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed here for security checks.
    }
}