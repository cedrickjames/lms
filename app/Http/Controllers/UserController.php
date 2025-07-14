<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Requirement;





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

public function showListOfLoaAccountHolder(){
    $userName = Auth::user()->userName;
    $listOfLOASubmitter =  DB::table('list_of_loa')->where('accountHolderUserName', $userName)->get();
    return view('listOfLOASubmitter', compact('listOfLOASubmitter'));
}

public function showListOfLoa(){
    $listOfLoa = DB::table('list_of_loa')->get();
    return view('listOfLOA', compact('listOfLoa'));
}



public function approveUser($id)
{
    $user = User::findOrFail($id);
    $user->status = 1;
    $user->save();

    return redirect()->back()->with('success', 'User approved successfully.');
}



public function submitLoa(Request $request)
{

    $type = $request->input('typeOfLOA');

    $requirements = DB::table('type_of_loa')
        ->where('legend', $type)
        ->first();

        $requiredDocs = [];
        $requiredDocsField = [];

$documentFields = \App\Models\Requirement::pluck('requirementName', 'requirementId')->toArray();

//           $documentFields = [
//     'requestLetter' => 'Request Letter',
//     'forecast' => 'Forecast',
//     'corMayorsPermitSubconInfoSheet' => "COR / Mayor's Permit / Subcontractor Information Sheet ",
//     'eCertificate' => 'E-Certificate',
//     'photo' => 'Photo',
//     'orderForm' => 'Order Form',
//     'laborCost' => 'Labor Cost',
//     'suretyBond' => 'Surety Bond',
//     'ledgerLiquidation' => "Ledger / Liquidation (PEZA/BOC)",
//     'certification' => 'Certification',
//     'bocSuretyBondApplication' => 'BOC Surety Bond Application',
// ];

        
foreach ($documentFields as $field => $label) {
     if (!empty($requirements->$field)) {
    $requiredDocs[] = $label;
    $requiredDocsField[] = $field;

     }
}


     $request->validate([
    'loa' => 'required',
    'typeOfLOA' => 'required',
    'supplier' => 'required',
    'accountHolder' => 'required',
    'accountHolderEmail' => 'required|email',
    'accountHolderDeptHead' => 'required',
    'accountHolderDeptHeadEmail' => 'required|email',
    'expiry' => 'required|date',
    'deadline' => 'required|date',
     ]);

    $numberOfRequirement = count($requiredDocs);



$insertData = [
    'loa' => $request->input('loa'),
    'type' => $request->input('typeOfLOA'),
    'supplier' => $request->input('supplier'),
    'accountHolder' => $request->input('accountHolder'),
    'accountHolderEmail' => $request->input('accountHolderEmail'),
    'accountHolderDeptHead' => $request->input('accountHolderDeptHead'),
    'accountHolderDeptHeadEmail' => $request->input('accountHolderDeptHeadEmail'),
    'contractExpirationDate' => $request->input('expiry'),
    'deadlineOfCompletion' => $request->input('deadline'),
    'created_at' =>\Carbon\Carbon::now('Asia/Manila'),
    'updated_at' => \Carbon\Carbon::now('Asia/Manila'),
    'numberOfRequirement' => $numberOfRequirement,
    'accountHolderUserName' => $request->input('username'),
    'filedBy' => Auth::user()->name,
    'filedById' => Auth::user()->userName

];

// Add "Pending" for each required document field
foreach ($requiredDocsField as $field) {
    $insertData[$field] = 'Pending';
}

// Insert into the database
DB::table('list_of_loa')->insert($insertData);


    $link = DB::table('link')->value('link');

$link = $link ?? 'http://localhost:8000/';
// Prepare email details
     $details = [
         'subject' => 'New LOA Filed',
        'title' => 'Letter of Autority Submission',
         'body' => 'A new LOA has been filed for ' . $request->input('accountHolder') . ' for supplier ' . $request->input('supplier') . '.',
         'deadline' => $request->input('deadline'),
         'link'=> $link,
         'type'=> $request->input('typeOfLOA'),
         'accountHolder'=>$request->input('accountHolder'),
         'requiredDocs'=>$requiredDocs,
     ];

        

         $userEmail = Auth::user()->email;


        Mail::to($request->input('accountHolderEmail'))
        ->cc([$request->input('accountHolderDeptHeadEmail'), $userEmail])
        ->send(new SampleMail($details));


    return redirect()->back()->with('success', 'LOA submitted and email sent successfully!');



}





public function login(Request $request)
{
    $incomingFields = $request->validate([
        'loginname' => 'required',
        'loginpassword' => 'required'
    ]);

    if (auth()->attempt(['userName' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
        $user = auth()->user();

        // Check if the user's status is 0 (not approved)
        if ($user->status == 0) {
            auth()->logout(); // Log out the user immediately
            return redirect()->back()->with('error', 'Your account is not yet approved.');
        }

        $request->session()->regenerate();

        // Redirect based on user_type
        if ($user->users_type === 'admin') {
            return redirect('/home');
        } else {
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
            'users_type' => ['required'],
            'profilePicture' => ['nullable', 'image','max:2048']

        ]);
        
            if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $incomingFields['profilePicture'] = 'images/' . $filename;
        }


        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $incomingFields['status'] = 0;
       $user =  User::create($incomingFields);
         $departments = DB::table('department')->get();
    // Return the registration view with a success message
    
        return view('register', [
                'departments' => $departments,
                'successMessage' => 'Registration successful! Please wait for admin approval.'
            ]);

    //    auth()->login($user);
          
    //     if ($user->users_type === 'admin') {
    //         return redirect('/home');
    //         } else {
    //         return redirect('/submitter');
    //         }

    }






}
