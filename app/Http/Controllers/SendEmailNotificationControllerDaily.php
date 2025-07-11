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
use App\Mail\PageVisitNotificationDaily;
use App\Models\Requirement;
class SendEmailNotificationControllerDaily extends Controller
{
  
public function showPage()
{

    $today = Carbon::today('Asia/Manila')->toDateString(); // '2025-07-03'
$nextWeek = Carbon::today('Asia/Manila')->addDays(7)->toDateString(); // '2025-07-10'

$approachingLoas = DB::table('list_of_loa')
 ->where('status', 'Pending')
    ->whereRaw("STR_TO_DATE(deadlineOfCompletion, '%M %d, %Y') > ?", [$today])
    ->whereRaw("STR_TO_DATE(deadlineOfCompletion, '%M %d, %Y') <= ?", [$nextWeek])
    ->get();


    // $overdueLoas = DB::table('list_of_loa')
    //     ->whereRaw("STR_TO_DATE(deadlineOfCompletion, '%M %d, %Y') < ?", [$today])
    //     ->get();
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

foreach ($approachingLoas as $loa) {
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
        ->send(new PageVisitNotificationDaily($loa, $pendingRequirements));
}


    // return view('emails.sampleNotificationDaily', compact('approachingLoas'));
    return view('emailAlert', ['message' => 'Message sent successfully!']);
    
}
}
