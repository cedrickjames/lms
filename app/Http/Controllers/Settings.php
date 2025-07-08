<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Settings extends Controller
{
    public function settings($settings){
        $departments = DB::table('department')->get();  // Fetch all departments

        return view('settings', compact('settings','departments'));

    }

    public function updateAccount(Request $request)
{
    $user = Auth::user();
 $oldUserName = $user->userName;
 $oldname = $user->name;

    $incomingFields = $request->validate([
        'userNameSettings' => ['required', 'min:3', 'max:20', Rule::unique('users', 'userName')->ignore($user->id)],
        'fullNameSettings' => ['required', 'min:3', 'max:100', Rule::unique('users', 'name')->ignore($user->id)],
        'emailSettings' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
        'departmentSetting' => ['required'],
        'passwordSettings' => ['nullable', 'min:5', 'max:200'],
        'confirmPasswordSettings' => ['nullable', 'same:passwordSettings'],
        'profilePicture' => ['nullable', 'image', 'max:2048']
    ]);

    // Handle profile picture upload
    if ($request->hasFile('profilePicture')) {
        $file = $request->file('profilePicture');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $user->profilePicture = 'images/' . $filename;
    }

    // Update fields
    $user->userName = $incomingFields['userNameSettings'];
    $user->name = $incomingFields['fullNameSettings'];
    $user->email = $incomingFields['emailSettings'];
    $user->department = $incomingFields['departmentSetting'];

    // Update password only if provided
    if (!empty($incomingFields['passwordSettings'])) {
        $user->password = bcrypt($incomingFields['passwordSettings']);
    }

    $user->save();

        // Update list_of_loa table
    DB::table('list_of_loa')
        ->where('filedById', $oldUserName)
        ->update([
            'filedBy' => $incomingFields['fullNameSettings'],
            'filedById' => $incomingFields['userNameSettings']
        ]);

            DB::table('list_of_loa')
        ->where('accountHolderUserName', $oldUserName)
        ->update([
            'accountHolder' => $incomingFields['fullNameSettings'],
            'accountHolderUserName' => $incomingFields['userNameSettings'],
            'accountHolderEmail' => $incomingFields['emailSettings'],

        ]);

         DB::table('list_of_loa')
        ->where('accountHolderDeptHead', $oldname)
        ->update([
            'accountHolderDeptHead' => $incomingFields['fullNameSettings'],
            'accountHolderDeptHeadEmail' => $incomingFields['emailSettings'],

        ]);

         // Update submitted_requirements table

          DB::table('submitted_requirements')
        ->where('accountHolderUserName', $oldUserName)
        ->update([
            'accountHolderName' => $incomingFields['fullNameSettings'],
            'accountHolderUserName' => $incomingFields['userNameSettings'],
        ]);

              DB::table('submitted_requirements')
        ->where('approvedById', $oldUserName)
        ->update([
            'approvedBy' => $incomingFields['fullNameSettings'],
            'approvedById' => $incomingFields['userNameSettings'],
            'approvedByEmail' => $incomingFields['emailSettings'],

        ]);


    return redirect()->back()->with('success', 'Account updated successfully!');
}






    
}
