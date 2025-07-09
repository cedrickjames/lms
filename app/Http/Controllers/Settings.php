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
 $users = DB::table('users')->get();  // Fetch all departments



        $supplier = DB::table('supplier')
->join('users', 'supplier.accountHolder', '=', 'users.id')
       ->select('supplier.*', 'users.name','users.userName','users.email')
    ->get();

        return view('settings', compact('settings','departments','supplier','users'));

    }


    public function addSupplier(Request $request)
{

    $incomingFields = $request->validate([
        'supplierNameAdd' => ['required', 'string'],
        'accountHolderAdd' => ['required', 'integer']

    ]);

         $insertData = [
    'created_at' => \Carbon\Carbon::now('Asia/Manila'),
    'updated_at' => \Carbon\Carbon::now('Asia/Manila'),
    'supplier' => $request->input('supplierNameAdd'),
    'accountHolder' => $request->input('accountHolderAdd'),
];

DB::table('supplier')->insert($insertData);

   return redirect()->back()->with('success', 'Supplier added successfully!');


}

public function updateSupplier(Request $request)
{
    $incomingFields = $request->validate([
        'supplierName' => ['required', 'string'],
        'accountHolder' => ['required', 'integer'],
        'supplierId' => ['required', 'integer'],
        'supplierNameOld' => ['required', 'string'],
        'supplierAccountHolderOld' => ['required', 'string'],
        'accountHolderName' => ['required', 'string'],
        'accountHolderUserName' => ['required', 'string'],
        'accountHolderEmail' => ['required', 'string'],


    ]);
    echo $incomingFields['accountHolder'];
    

    DB::table('supplier')
        ->where('id', $incomingFields['supplierId'])
        ->update([
            'supplier' => $incomingFields['supplierName'],
            'accountHolder' => $incomingFields['accountHolder']
        ]);
            DB::table('list_of_loa')
        ->where('supplier', $incomingFields['supplierNameOld'])
        ->update([
            'supplier' => $incomingFields['supplierName'],
            'accountHolder' => $incomingFields['accountHolderName'],
            'accountHolderUserName' => $incomingFields['accountHolderUserName'],
            'accountHolderEmail' => $incomingFields['accountHolderEmail']
        ]);

         DB::table('submitted_requirements')
        ->where('supplier', $incomingFields['supplierNameOld'])
        ->update([
            'supplier' => $incomingFields['supplierName'],
            'accountHolderName' => $incomingFields['accountHolderName'],
            'accountHolderUserName' => $incomingFields['accountHolderUserName']
        ]);


        
    return redirect()->back()->with('success', 'Supplier updated successfully!');
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
