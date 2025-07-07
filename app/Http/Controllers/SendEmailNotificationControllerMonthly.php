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
use App\Mail\PageVisitNotificationMonthly;

class SendEmailNotificationControllerMonthly extends Controller
{
      
public function showPage()
{

$today = Carbon::today('Asia/Manila')->toDateString(); // e.g., '2025-07-03'
$nextMonth = Carbon::today('Asia/Manila')->addDays(32)->toDateString(); // e.g., '2025-08-04'

$futureLoas = DB::table('list_of_loa')
    ->whereRaw("STR_TO_DATE(deadlineOfCompletion, '%M %d, %Y') > ?", [$nextMonth])
    ->get();


    // $overdueLoas = DB::table('list_of_loa')
    //     ->whereRaw("STR_TO_DATE(deadlineOfCompletion, '%M %d, %Y') < ?", [$today])
    //     ->get();

$documentFields = [
    'requestLetter' => 'Request Letter',
    'forecast' => 'Forecast',
    'corMayorsPermitSubconInfoSheet' => "COR / Mayor's Permit / Subcontractor Information Sheet",
    'eCertificate' => 'E-Certificate',
    'photo' => 'Photo',
    'orderForm' => 'Order Form',
    'laborCost' => 'Labor Cost',
    'suretyBond' => 'Surety Bond',
    'ledgerLiquidation' => "Ledger / Liquidation (PEZA/BOC)",
    'certification' => 'Certification',
    'bocSuretyBondApplication' => 'BOC Surety Bond Application',
];

foreach ($futureLoas as $loa) {
    $pendingRequirements = [];

    foreach ($documentFields as $column => $label) {
        if (isset($loa->$column) && $loa->$column === 'Pending') {
            $pendingRequirements[] = $label;
        }
    }

    Mail::to($loa->accountHolderEmail)
        ->cc($loa->accountHolderDeptHeadEmail)
        ->send(new PageVisitNotificationMonthly($loa, $pendingRequirements));
}


    return view('emails.sampleNotificationMonthly', compact('futureLoas'));
}
}
