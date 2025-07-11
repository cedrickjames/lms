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
use App\Mail\PageVisitNotificationWeekly;
use App\Models\Requirement;
class SendEmailNotificationControllerWeekly extends Controller
{
    
public function showPage()
{

    $today = Carbon::today('Asia/Manila')->toDateString(); // '2025-07-03'
$nextMonth = Carbon::today('Asia/Manila')->addDays(31)->toDateString(); // '2025-07-10'

$approachingLoas = DB::table('list_of_loa')
 ->where('status', 'Pending')
    ->whereRaw("STR_TO_DATE(deadlineOfCompletion, '%M %d, %Y') > ?", [$today])
    ->whereRaw("STR_TO_DATE(deadlineOfCompletion, '%M %d, %Y') <= ?", [$nextMonth])
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

    Mail::to($loa->accountHolderEmail)
        ->cc($loa->accountHolderDeptHeadEmail)
        ->send(new PageVisitNotificationWeekly($loa, $pendingRequirements));
}


    return view('emails.sampleNotificationWeekly', compact('approachingLoas'));
}


}
