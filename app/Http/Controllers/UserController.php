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

public function showFileALoa()
{
    $typesOfLoa = DB::table('type_of_loa')->get();
    $supplier = DB::table('supplier')->get(); // or your actual table name
    $user = DB::table('users')->get(); // or your actual table name
    $email = DB::table('users')->get(); 

    $deptHead = DB::table('users')->where('users_type', 'head')->get();  // SELECT * FROM users WHERE users_type = 'head';
    $deptHeadEmail = DB::table('users')->where('users_type', 'head')->get(); 

    return view('fileALoa', compact('typesOfLoa', 'supplier','user','email','deptHead','deptHeadEmail'));
}

public function submitLoa(Request $request)
{
    DB::table('list_of_loa')->insert([
        'loa' => $request->input('loa'),
        'type' => $request->input('typeOfLOA'),
        'supplier' => $request->input('supplier'),
        'accountHolder' => $request->input('accountHolder'),
        'accountHolderEmail' => $request->input('accountHolderEmail'),
        'accountHolderDeptHead' => $request->input('accountHolderDeptHead'),
        'accountHolderDeptHeadEmail' => $request->input('accountHolderDeptHeadEmail'),
        'contractExpirationDate' => $request->input('expiry'),
        'deadlineOfCompletion' => $request->input('deadline'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'LOA submitted successfully!');
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
        } else  {
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
            'password' => ['required', 'min:5', 'max:200'],
            'users_type' => ['required']

        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
       $user =  User::create($incomingFields);
       auth()->login($user);
           return redirect('/home');
    }



}
