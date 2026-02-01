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
        dd($data);
        return view('welcome_message', compact('data'));

       // var_dump(compact('data'));
    }
}
