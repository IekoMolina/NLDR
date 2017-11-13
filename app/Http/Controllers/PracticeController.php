<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
class PracticeController extends Controller
{
    
    public function index()
    {
    	$users = Users::selectUsers();
    	return $users;
    	//return view('insertForm')->with('users', $users);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }
}
