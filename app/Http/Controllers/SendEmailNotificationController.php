<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\RequirementMail;
use Illuminate\Support\Facades\DB;
use App\Mail\PageVisitNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Requirement;

class SendEmailNotificationController extends Controller
{

public function showPage()
{
    $today = Carbon::today('Asia/Manila')->format('Y-m-d');

    $overdueLoas = DB::table('list_of_loa')
     ->where('status', 'Pending')
        ->whereRaw("STR_TO_DATE(deadlineOfCompletion, '%M %d, %Y') < ?", [$today])
        ->get();

  $documentFields = \App\Models\Requirement::pluck('requirementName', 'requirementId')->toArray();


// $documentFields = [
//     'requestLetter' => 'Request Letter',
//     'forecast' => 'Forecast',
//     'corMayorsPermitSubconInfoSheet' => "COR / Mayor's Permit / Subcontractor Information Sheet",
//     'eCertificate' => 'E-Certificate',
//     'photo' => 'Photo',
//     'orderForm' => 'Order Form',
//     'laborCost' => 'Labor Cost',
//     'suretyBond' => 'Surety Bond',
//     'ledgerLiquidation' => "Ledger / Liquidation (PEZA/BOC)",
//     'certification' => 'Certification',
//     'bocSuretyBondApplication' => 'BOC Surety Bond Application',
// ];



foreach ($overdueLoas as $loa) {
    
    $pendingRequirements = [];

    foreach ($documentFields as $column => $label) {
        if (isset($loa->$column) && $loa->$column === 'Pending') {
            $pendingRequirements[] = $label;
        }
    }

    $adminEmails = User::where('users_type', 'admin')->pluck('email')->toArray();

$ccEmails = array_merge([$loa->accountHolderDeptHeadEmail], $adminEmails);


    Mail::to($loa->accountHolderEmail)
        ->cc($ccEmails)
        ->send(new PageVisitNotification($loa, $pendingRequirements));
}


// dd($overdueLoas, $message);
// return view('emails.sampleNotification', [
//     'overdueLoas' => $overdueLoas,
//     'message' => 'Message sent successfully!'
// ]);
return view('emailAlert', ['message' => 'Message sent successfully!']);
    // return view('emails.sampleNotification', compact('overdueLoas'));
}


}
