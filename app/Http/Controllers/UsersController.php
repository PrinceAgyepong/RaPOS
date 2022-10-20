<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    function index(){
        $users = User::withTrashed()->where('user_type_id', 2)->get();
        // dd($users->get());
        return view('users.index', compact('users'));
    }

    function create(){
        return view('users.create');
    }

    function edit(User $user){

        return view('users.edit', compact('user'));
    }

    function store(Request $request){
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'confirmed|required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $user_type_id = 2;
        
        $user = User::create(compact('name', 'email', 'password', 'user_type_id'));

        return redirect()->route('users.index');
    }

    function destroy (User $user){
        $user->delete();

        return redirect()->route('users.index');
    }

    function restore($id){
        User::withTrashed()->where('id', $id)->restore();

        return redirect()->route('users.index');
    }

    function update(Request $request, $id){
        
        User::find($id)->update($request->all());

        return redirect()->route('users.index');
        
    }
}
