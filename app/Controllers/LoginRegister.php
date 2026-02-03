<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; // Make sure you have a User Model created!

class LoginRegister extends BaseController
{
    // 1. Show the Login Page
    public function login()
    {
        //session()->destroy();
        // // If already logged in, redirect them away (uses your 'guest' filter logic manually here just in case)
        // if (session()->get('isLoggedIn')) {
        //     return (session()->get('user_type') == 1) 
        //         ? redirect()->to('/admin/dashboard') 
        //         : redirect()->to('/auth/dashboard');
        // }

        return view('Login'); // Load your login view file
    }

     public function login2()
    {
        //session()->destroy();
        // // If already logged in, redirect them away (uses your 'guest' filter logic manually here just in case)
        // if (session()->get('isLoggedIn')) {
        //     return (session()->get('user_type') == 1) 
        //         ? redirect()->to('/admin/dashboard') 
        //         : redirect()->to('/auth/dashboard');
        // }

       return 'hello';
    }
  
    // 2. Process the Form Submission (The "Action")
    public function login_process()
    {
        $session = session();
        $model   = new UserModel();

        // Get form data
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Check if user exists
        $user = $model->where('email', $email)->first();

        if ($user) {
            // Verify Password (assuming you use password_hash)
            // If you are using plain text (not recommended), use: if($password == $user['password'])
            if (password_verify($password, $user['password'])) {
                
                // DATA TO SAVE IN SESSION
                $loginData = [
                    'id'        => $user['id'],
                    'name'      => $user['name'],
                    'email'     => $user['email'],
                    'user_type' => $user['user_type'], // 1 = Admin, 2 = Regular User
                    'isLoggedIn'=> true,
                ];
                
                $session->set($loginData);

                // ---------------------------------------------------------
                // THIS IS WHERE THE DECISION HAPPENS
                // ---------------------------------------------------------
                if ($user['user_type'] == 1) {
                    return redirect()->to('/admin/dashboard');
                } else {
                    // Regular user / Guest
                    return redirect()->to('/auth/dashboard'); 
                }
            }
        }

        // If login fails:
        return redirect()->back()->with('error', 'Invalid login credentials');
    }
    
    public function register()
    {
        return view('register');
    }

    public function login_process_test2(){

    ECHO  'ADASDSAD';
        // 1. Get a single field by its "name" attribute
        $username = $this->request->getPost('txt_name');
        $password = $this->request->getPost('txt_password');

        // 2. OR get everything as an associative array
        $allData = $this->request->getPost();

       
    }
}