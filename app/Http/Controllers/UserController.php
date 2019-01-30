<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('user.all_users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.all_users');   
    }

    public function store(Request $request)
    {
        $input =  $request->all();
        $user = User::create($input);
        Session::flash('user-add','user added successfully');
        return redirect()->route('getAllUser');

    }

    public function edit($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        $user->update($data);
        Session::flash('user-update','user update successfully');
        return redirect()->route('getAllUser');
    }

    public function delete($id)
    {
        $user = user::find($id);
        if($user):
            $user->delete();
            Session::flash('user-delete','user deleted successfull');
        else: 
            abort('404');
        endif;
        return redirect()->back();

    }
}
