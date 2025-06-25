<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

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




    if ($requirement) {
        $requirementQuery = DB::table('submitted_requirements')
        ->where('requirement', $requirement)
        ->where('loaId',$id)
        ->first();

         // Do something with it

     } 





        return view('loaDetails', compact('loa', 'typeDetails','status', 'statusColor', 'requiredDocs' ,'requiredDocsNameWithStatus','requirementQuery'));
    }
}
