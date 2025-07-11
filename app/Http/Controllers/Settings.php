<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Settings extends Controller
{
    public function settings($settings){

        $user = auth()->user();

        
        if ($user->users_type === 'submitter' && $settings !== 'account') {
            return redirect('/')->with('error', 'Access denied. Submitters can only access account settings.');
            }


        $departments = DB::table('department')->get();  // Fetch all departments
        $users = DB::table('users')->get();  // Fetch all users
        $users2 = DB::table('users')->get();  // Fetch all users

        $requirement = DB::table('requirements')->get();
        $requirement2 = DB::table('requirements')->get();

        $typeOfLoa = DB::table('type_of_loa')->get();




        $supplier = DB::table('supplier')
->join('users', 'supplier.accountHolder', '=', 'users.id')
       ->select('supplier.*', 'users.name','users.userName','users.email')
    ->get();

        return view('settings', compact('settings','departments','supplier','users','users2','requirement','requirement2','typeOfLoa'));

    }


    public function updateTypeOfLoa(Request $request)
{



            // Get all requirement IDs from the database
        $allRequirements = DB::table('requirements')->pluck('requirementId');
         // Get selected requirement IDs from the request (checked checkboxes)
        $selectedRequirements = $request->input('requirements', []);
    $incomingFields = $request->validate([
          'typeOfLoaIdOld' => ['required', 'string'],
        'typeOfLoaNameOld' => ['required', 'string'],
        'typeOfLoaNameIdOld' => ['required', 'string'],
        'typeOfLoaLegendOld' => ['required', 'string'],
        'typeNameEdit' => ['required', 'string','unique:type_of_loa,nameOfLOA'],
      'typeIdEdit' => ['required', 'string', 'regex:/^\S+$/','unique:type_of_loa,typeOfLOA'],
      'legendEdit' => ['required', 'string', 'regex:/^\S+$/','unique:type_of_loa,legend'],
      'requirements' => ['nullable', 'array'],
      'requirements.*' => ['string', 'exists:requirements,requirementId'],

        ]);

        $insertData = [
    'updated_at' => \Carbon\Carbon::now('Asia/Manila'),
    'typeOfLOA' => $request->input('typeId'),
    'nameOfLOA' => $request->input('typeNameAdd'),
    'legend' => $request->input('legend'),
            // i want to insert the requirementId here then => if the checkbox is checked just add 1
        ];


        //   DB::table('requirements')
        // ->where('id', $incomingFields['requirementIdOld'])

        
}


    public function addTypeOfLOA(Request $request){

        
        // Get all requirement IDs from the database
        $allRequirements = DB::table('requirements')->pluck('requirementId');

        // Get selected requirement IDs from the request (checked checkboxes)
        $selectedRequirements = $request->input('requirements', []);



         $incomingFields = $request->validate([
        'typeNameAdd' => ['required', 'string','unique:type_of_loa,nameOfLOA'],
      'typeId' => ['required', 'string', 'regex:/^\S+$/','unique:type_of_loa,typeOfLOA'],
      'legend' => ['required', 'string', 'regex:/^\S+$/','unique:type_of_loa,legend'],
      'requirements' => ['nullable', 'array'],
      'requirements.*' => ['string', 'exists:requirements,requirementId'],

        ]);

             $insertData = [
    'created_at' => \Carbon\Carbon::now('Asia/Manila'),
    'updated_at' => \Carbon\Carbon::now('Asia/Manila'),
    'typeOfLOA' => $request->input('typeId'),
    'nameOfLOA' => $request->input('typeNameAdd'),
    'legend' => $request->input('legend'),
            // i want to insert the requirementId here then => if the checkbox is checked just add 1
        ];
        

// Loop through all requirements and set 1 if selected, 0 if not
        foreach ($allRequirements as $requirementId) {
             $insertData[$requirementId] = in_array($requirementId, $selectedRequirements) ? 1 : 0;
        }




         DB::table('type_of_loa')->insert($insertData);
        return redirect()->back()->with('success', 'Type of LOA added successfully!');


    }
    public function addRequirement(Request $request){

         $incomingFields = $request->validate([
        'requirementNameAdd' => ['required', 'string'],
      'requirementId' => ['required', 'string', 'regex:/^\S+$/','unique:requirements,requirementId']
    ]);

    $requirementId = $request->input('requirementId');

     $insertData = [
    'created_at' => \Carbon\Carbon::now('Asia/Manila'),
    'updated_at' => \Carbon\Carbon::now('Asia/Manila'),
    'requirementId' => $request->input('requirementId'),
    'requirementName' => $request->input('requirementNameAdd'),
];
    DB::table('requirements')->insert($insertData);

// Dynamically add column to list_of_loa table if it doesn't exist
     if (!Schema::hasColumn('list_of_loa', $requirementId)) {
        Schema::table('list_of_loa', function (Blueprint $table) use ($requirementId) {
             $table->string($requirementId)->nullable()->collation('utf8mb4_unicode_ci');
        });
    }

        if (!Schema::hasColumn('type_of_loa', $requirementId)) {
            Schema::table('type_of_loa', function (Blueprint $table) use ($requirementId) {
             $table->boolean($requirementId)->nullable(false);

            });
        }

    
    return redirect()->back()->with('success', 'Requirement added successfully!');



    }
    public function addSupplier(Request $request)
{

    $incomingFields = $request->validate([
        'supplierNameAdd' => ['required', 'string','unique:supplier,supplier'],
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



public function updateRequirements(Request $request)
{
    $incomingFields = $request->validate([
        'requirementIdOld' => ['required', 'string'],
        'requirementNameOld' => ['required', 'string'],
        'requirementNameIdOld' => ['required', 'string'],
        'requirementNameEdit' => ['required', 'string'],
        'requirementIdEdit' => ['required', 'string'],


    ]);

    DB::table('requirements')
        ->where('id', $incomingFields['requirementIdOld'])
        ->update([
            'requirementId' => $incomingFields['requirementIdEdit'],
            'requirementName' => $incomingFields['requirementNameEdit']
        ]);

            DB::table('submitted_requirements')
        ->where('requirement', $incomingFields['requirementNameIdOld'])
        ->update([
            'requirement' => $incomingFields['requirementIdEdit'],
            'requirementName' => $incomingFields['requirementNameEdit']
        ]);

        
// Rename the column in type_of_loa table
    if (Schema::hasColumn('type_of_loa', $incomingFields['requirementNameIdOld'])) {
         Schema::table('type_of_loa', function (Blueprint $table) use ($incomingFields) {
            $table->renameColumn($incomingFields['requirementNameIdOld'], $incomingFields['requirementIdEdit']);
         });
     }
     // Rename the column in list_of_loa table
    if (Schema::hasColumn('list_of_loa', $incomingFields['requirementNameIdOld'])) {
         Schema::table('list_of_loa', function (Blueprint $table) use ($incomingFields) {
            $table->renameColumn($incomingFields['requirementNameIdOld'], $incomingFields['requirementIdEdit']);
         });
     }



    return redirect()->back()->with('success', 'Requirement updated successfully!');

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


    // echo $incomingFields['accountHolder'];
    

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




public function updateAccountAdmin(Request $request)
{
    $userId = $request->input('userIdSettings');
    $user = User::findOrFail($userId); // Get the user being edited

    $oldUserName = $user->userName;
    $oldname = $user->name;

    $incomingFields = $request->validate([
        'userNameSettings' => ['required', 'min:3', 'max:20', Rule::unique('users', 'userName')->ignore($user->id)],
        'fullNameSettings' => ['required', 'min:3', 'max:100', Rule::unique('users', 'name')->ignore($user->id)],
        'emailSettings' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
        'departmentSetting' => ['required'],
        'passwordSettings' => ['nullable', 'min:5', 'max:200'],
        'confirmPasswordSettings' => ['nullable', 'same:passwordSettings'],
        'profilePicture' => ['nullable', 'image', 'max:2048'],
        'status' => ['nullable']
    ]);

    if ($request->hasFile('profilePicture')) {
        $file = $request->file('profilePicture');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $user->profilePicture = 'images/' . $filename;
    }

    $user->userName = $incomingFields['userNameSettings'];
    $user->name = $incomingFields['fullNameSettings'];
    $user->email = $incomingFields['emailSettings'];
    $user->department = $incomingFields['departmentSetting'];
    $user->status = $request->has('status') ? 1 : 0;

    if (!empty($incomingFields['passwordSettings'])) {
        $user->password = bcrypt($incomingFields['passwordSettings']);
    }

    $user->save();

    // Update related tables (same as before)
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




//  public function updateAccountAdmin2(Request $request)
// {
//     $user = Auth::user();
//  $oldUserName = $user->userName;
//  $oldname = $user->name;

//     $incomingFields = $request->validate([
//         'userNameSettings' => ['required', 'min:3', 'max:20', Rule::unique('users', 'userName')->ignore($user->id)],
//         'fullNameSettings' => ['required', 'min:3', 'max:100', Rule::unique('users', 'name')->ignore($user->id)],
//         'emailSettings' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
//         'departmentSetting' => ['required'],
//         'passwordSettings' => ['nullable', 'min:5', 'max:200'],
//         'confirmPasswordSettings' => ['nullable', 'same:passwordSettings'],
//         'profilePicture' => ['nullable', 'image', 'max:2048']
//     ]);

//     // Handle profile picture upload
//     if ($request->hasFile('profilePicture')) {
//         $file = $request->file('profilePicture');
//         $filename = time() . '_' . $file->getClientOriginalName();
//         $file->move(public_path('images'), $filename);
//         $user->profilePicture = 'images/' . $filename;
//     }

//     // Update fields
//     $user->userName = $incomingFields['userNameSettings'];
//     $user->name = $incomingFields['fullNameSettings'];
//     $user->email = $incomingFields['emailSettings'];
//     $user->department = $incomingFields['departmentSetting'];

//     // Update password only if provided
//     if (!empty($incomingFields['passwordSettings'])) {
//         $user->password = bcrypt($incomingFields['passwordSettings']);
//     }

//     $user->save();

//         // Update list_of_loa table
//     DB::table('list_of_loa')
//         ->where('filedById', $oldUserName)
//         ->update([
//             'filedBy' => $incomingFields['fullNameSettings'],
//             'filedById' => $incomingFields['userNameSettings']
//         ]);

//             DB::table('list_of_loa')
//         ->where('accountHolderUserName', $oldUserName)
//         ->update([
//             'accountHolder' => $incomingFields['fullNameSettings'],
//             'accountHolderUserName' => $incomingFields['userNameSettings'],
//             'accountHolderEmail' => $incomingFields['emailSettings'],

//         ]);

//          DB::table('list_of_loa')
//         ->where('accountHolderDeptHead', $oldname)
//         ->update([
//             'accountHolderDeptHead' => $incomingFields['fullNameSettings'],
//             'accountHolderDeptHeadEmail' => $incomingFields['emailSettings'],

//         ]);

//          // Update submitted_requirements table

//           DB::table('submitted_requirements')
//         ->where('accountHolderUserName', $oldUserName)
//         ->update([
//             'accountHolderName' => $incomingFields['fullNameSettings'],
//             'accountHolderUserName' => $incomingFields['userNameSettings'],
//         ]);

//               DB::table('submitted_requirements')
//         ->where('approvedById', $oldUserName)
//         ->update([
//             'approvedBy' => $incomingFields['fullNameSettings'],
//             'approvedById' => $incomingFields['userNameSettings'],
//             'approvedByEmail' => $incomingFields['emailSettings'],

//         ]);


//     return redirect()->back()->with('success', 'Account updated successfully!');
// }





    
}
