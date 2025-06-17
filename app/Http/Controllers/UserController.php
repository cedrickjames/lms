<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   

public function create()
{
    $departments = DB::table('department')->get();  // Fetch all departments
     return view('register', compact('departments'));
}


public function login(Request $request)
{
    $incomingFields = $request->validate([
        'loginname' => 'required',
        'loginpassword' => 'required'
    ]);

    if (auth()->attempt(['userName' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
        $request->session()->regenerate();

        // Get the authenticated user
        $user = auth()->user();

        // Redirect based on user_type
        if ($user->users_type === 'admin') {
            return redirect('/home');
        } elseif ($user->users_type === 'submitter') {
            return redirect('/submitter');
        }
    }

    // If login fails
    return redirect()->back()->with('error', 'Invalid username or password.');
}




    public function logout(){
        auth()->logout();
        return redirect('/');
    }

public function register(Request $request){
        $incomingFields = $request->validate([
            'userName' => ['required', 'min:3', 'max:20', Rule::unique('users', 'userName')],
            'name' => ['required', 'min:3', 'max:100', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'department' => ['required'],
            'password' => ['required', 'min:5', 'max:200']

        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
       $user =  User::create($incomingFields);
       auth()->login($user);
           return redirect('/home');
    }



}
