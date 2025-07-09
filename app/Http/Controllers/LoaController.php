<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequirementMail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
class LoaController extends Controller
{
    public function show($id, $requirement = null)
    {
        $loa = DB::table('list_of_loa')->where('id', $id)->first();

        if (!$loa) {
            abort(404, 'LOA not found');
        }

        $deadline = Carbon::parse($loa->deadlineOfCompletion);
        $today = Carbon::today();
        
$status = 'Pending';
    $statusColor = 'text-black';

    if ($today->greaterThanOrEqualTo($deadline)) {
       $status = 'Overdue';
       $statusColor = 'text-red-500';
    } elseif ($today->diffInDays($deadline) <= 7) {
       $status = 'Approaching the Deadline';
    }


        $typeDetails = DB::table('type_of_loa')->where('legend', $loa->type)->first();



            $requirements = DB::table('type_of_loa')
        ->where('legend', $loa->type)
        ->first();

        $requiredDocs = [];
        $requiredDocsField = [];



          $documentFields = [
    'requestLetter' => 'Request Letter',
    'forecast' => 'Forecast',
    'corMayorsPermitSubconInfoSheet' => "COR / Mayor's Permit / Subcontractor Information Sheet ",
    'eCertificate' => 'E-Certificate',
    'photo' => 'Photo',
    'orderForm' => 'Order Form',
    'laborCost' => 'Labor Cost',
    'suretyBond' => 'Surety Bond',
    'ledgerLiquidation' => "Ledger / Liquidation (PEZA/BOC)",
    'certification' => 'Certification',
    'bocSuretyBondApplication' => 'BOC Surety Bond Application',
        ];

                
        foreach ($documentFields as $field => $label) {
            if (!empty($requirements->$field)) {
            $requiredDocs[] = $label;
            $requiredDocsField[] = $field;

            }
            }

            
        $loaData  = DB::table('list_of_loa')
        ->select($requiredDocsField)
        ->where('id', $loa->id) // Assuming you're filtering by a specific LOA record
        ->first();

        
$requiredDocsWithStatus = [];
$requiredDocsNameWithStatus = [];


        foreach ($documentFields as $field => $label) {
            if (!empty($loaData->$field)) {
                

         $requiredDocsNameWithStatus[] = [
            'label' => $label,
            'status' => $loaData->$field,
            'field' => $field,
            ];

            // $requiredDocsNameWithStatus[$label] = $loaData->$field;

            }
            }
            
// echo '<pre>';
// print_r($requiredDocsNameWithStatus);
// echo '</pre>';

// if ($loaData) {
//      foreach ($requiredDocsField as $field) {
//     $requiredDocsWithStatus[$field] = $loaData->$field;
//     }
// }


$requirementQuery = "";

    if ($requirement) {
        $requirementQuery = DB::table('submitted_requirements')
        ->where('requirement', $requirement)
        ->where('loaId',$id)
        ->first();

         // Do something with it

     } 
     else{
        $requirementQuery = "";
        $requirement="";
     }

if (!is_null($requirement) && array_key_exists($requirement, $documentFields)) {
    $requirementName = $documentFields[$requirement];
} else {
    $requirement = '';
    $requirementName = ''; // or handle it however you prefer
}


        return view('loaDetails', compact('loa', 'typeDetails','status', 'statusColor', 'requiredDocs' ,'requiredDocsNameWithStatus','requirementQuery','requirement','requirementName'));
    }

    public function submitRequirement(Request $request){
             $request->validate([
    'loaId' => 'required',
    'loaName' => 'required',
    'requirement' => 'required',
    'requirementName' => 'required',
    'accountHolderUserName' => 'required',
    'accountHolderName' => 'required',
    'loaSupplier' => 'required',


     ]);

     
$dateSubmitted = date('F j, Y'); // Outputs: June 26, 2025


     $insertData = [
    'loaId' => $request->input('loaId'),
    'supplier' => $request->input('loaSupplier'),
    'loaName' => $request->input('loaName'),
    'requirement' => $request->input('requirement'),
    'requirementName' => $request->input('requirementName'),
    'accountHolderUserName' => $request->input('accountHolderUserName'),
    'accountHolderName' => $request->input('accountHolderName'),
    'emailStatus'=>'sent',
    'dateSubmitted' => $dateSubmitted,
    'dateConfirmed' => '',
    'status' => 'For Approval',
    'created_at' => \Carbon\Carbon::now('Asia/Manila'),
    'updated_at' => \Carbon\Carbon::now('Asia/Manila'),

];
DB::table('submitted_requirements')->insert($insertData);

DB::table('list_of_loa')
    ->where('id', $request->input('loaId'))
    ->update([
        $request->input('requirement') => 'For Approval',
        'numberOfSubmittedRequirement' => DB::raw('numberOfSubmittedRequirement + 1')
        ]);
    

                $details = [
                    'subject' => 'New Requirement Submitted',
                    'title' => 'Requirement Submission',
                    'body' => $request->input('requirementName').' has been submitted by ' .  $request->input('accountHolderName') . ' for ' . $request->input('loaName') . '.',
                    'link'=>'http://localhost:8000/listOfLOA',
                    'requirement'=> $request->input('requirementName'),
                    'loa'=> $request->input('loaName'),
                    'accountHolder'=>$request->input('accountHolderName'),
                    'recepient'=>'LMS Administrators'
                ];

        

         $userEmail = Auth::user()->email;


        $adminEmails = User::where('users_type', 'admin')->pluck('email')->toArray();

        Mail::to($adminEmails)
        ->cc([$request->input('deptHeadEmail'), $userEmail])
        ->send(new RequirementMail($details));



   return redirect()->back()->with('success', 'Requirement submitted successfully!');



    }




    public function confirmRequirement(Request $request){
             $request->validate([
    'loaId' => 'required',
    'loaName' => 'required',
    'requirement' => 'required',
    'requirementName' => 'required',
    'accountHolderUserName' => 'required',
    'accountHolderName' => 'required',
    'accountHolderEmail' => 'required',


     ]);

     
$dateNow = date('F j, Y'); // Outputs: June 26, 2025


//      $insertData = [
//     'loaId' => $request->input('loaId'),
//     'loaName' => $request->input('loaName'),
//     'requirement' => $request->input('requirement'),
//     'requirementName' => $request->input('requirementName'),
//     'accountHolderUserName' => $request->input('accountHolderUserName'),
//     'accountHolderName' => $request->input('accountHolderName'),
//     'emailStatus'=>'sent',
//     'dateSubmitted' => $dateSubmitted,
//     'dateConfirmed' => '',
//     'status' => 'For Approval',
//     'created_at' => now(),
//     'updated_at' => now(),

// ];
// DB::table('submitted_requirements')->insert($insertData);

$loaId = $request->input('loaId');
$requirementField = $request->input('requirement');


// Get current LOA data
$loa = DB::table('list_of_loa')->where('id', $loaId)->first();

if ($loa) {
$newConfirmedCount = $loa->numberOfConfirmedRequirements + 1;

$updateData = [
     $requirementField => 'Completed',
     'numberOfConfirmedRequirements' => DB::raw('numberOfConfirmedRequirements + 1'),
     ];

     
// Check if all requirements are completed
    if ($newConfirmedCount >= $loa->numberOfRequirement) {
     $updateData['status'] = 'Completed';
     }

DB::table('list_of_loa')->where('id', $loaId)->update($updateData);
}


// DB::table('list_of_loa')
//     ->where('id', $request->input('loaId'))
//     ->update([
//         $request->input('requirement') => 'Completed',
//         'numberOfConfirmedRequirements' => DB::raw('numberOfConfirmedRequirements + 1')
//         ]);

DB::table('submitted_requirements')
    ->where('loaId', $request->input('loaId'))
    ->where('requirement', $request->input('requirement'))

    ->update([
        'status' => 'Completed',
        'dateConfirmed' => $dateNow,
         'approvedBy' => Auth::user()->name,
        'approvedById' => Auth::user()->userName,
         'approvedByEmail' => Auth::user()->email,
         'updated_at' => \Carbon\Carbon::now('Asia/Manila')
        ]);



                $details = [
                    'subject' => 'A Requirement Confirmed',
                    'title' => 'Requirement Completion',
                    'body' => $request->input('requirementName').' has been confirmed by ' .  Auth::user()->name . ' for ' . $request->input('loaName') . '.',
                    'link'=>'http://localhost:8000/listOfLOA',
                    'requirement'=> $request->input('requirementName'),
                    'loa'=> $request->input('loaName'),
                    'accountHolder'=>$request->input('accountHolderName'),
                    'recepient'=>$request->input('accountHolderName')
                ];

        

         $userEmail = Auth::user()->email;


        $accountHolderEmail = $request->input('accountHolderEmail');

        Mail::to($accountHolderEmail)
        ->cc([$request->input('deptHeadEmail'), $userEmail])
        ->send(new RequirementMail($details));



   return redirect()->back()->with('success', 'Requirement confirmed successfully!');



    }


}
