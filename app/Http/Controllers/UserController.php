<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {        
        $users = User::paginate(10);
 
        return view('users', compact('users'));
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
  
        return response()->json($user);
    }
}
