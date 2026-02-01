<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        $users_model = new UserModel();
        //fetch all / Select * From usersTable;
        $data = $users_model ->findAll();
      
        return view('welcome_message', compact('data'));
          // dd($data);
       // var_dump(compact('data'));
    }


    public function get_from_form(){
        //Get the post Data
        if($this->request->getMethod() === "post"){
            $data = $this->request->getVar();
        }


        return redirect()->to('/success');
    }



    
//     $currentUserId = Session::get('loginId');

//     $user= DB::table('users')
//     ->where('users.id', '=', $currentUserId)
//     ->select('users.*')
//     ->first();
// -------------------------------------------------------------------------------------------
// public function your_account_update(Request $request)
// {
//     $currentUserId = Session::get('loginId');
//     // Validate the incoming request
//     $request->validate([
     
//         'email' => 'required|email|max:255',
//         'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:100000',
//     ]);
  //return redirect()->back()->with('success', 'Account updated successfully.');
}

