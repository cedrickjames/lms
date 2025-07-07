<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class tablesController extends Controller
{
   public function showListOfLoaOverDue()
{

$today = Carbon::today('Asia/Manila');
$allLoas = DB::table('list_of_loa')
->where('status', 'Pending')
->get();

$overdueLoas = $allLoas->filter(function ($loa) use ($today) {
    $deadline = Carbon::parse($loa->deadlineOfCompletion);
    return $deadline->lt($today);
});



 return view('overdue', compact('overdueLoas'));

}
 public function showListOfLoaOverDueSubmitter()
{

$userName = Auth::user()->userName;
$today = Carbon::today('Asia/Manila');
$allLoas = DB::table('list_of_loa')->where('accountHolderUserName', $userName)
->where('status', 'Pending')
->get();

$overdueLoas = $allLoas->filter(function ($loa) use ($today) {
    $deadline = Carbon::parse($loa->deadlineOfCompletion);
    return $deadline->lt($today);
});



 return view('overdueSubmitter', compact('overdueLoas'));

}

  public function showListOfLoaApproaching()
{
$today = Carbon::today('Asia/Manila');
$nextWeek = Carbon::today()->addDays(7);

$allLoas = DB::table('list_of_loa')
->where('status', 'Pending')
->get();

$approaching = $allLoas->filter(function ($loa) use ($today, $nextWeek) {
    try {
        $deadline = Carbon::parse($loa->deadlineOfCompletion);
        return $deadline->greaterThan($today) && $deadline->lessThanOrEqualTo($nextWeek);
    } catch (\Exception $e) {
        return false; // skip invalid dates
    }
});



 return view('approachingTheDeadline', compact('approaching'));

}

  public function showListOfLoaApproachingSubmitter()
{
$today = Carbon::today('Asia/Manila');
$nextWeek = Carbon::today()->addDays(7);
$userName = Auth::user()->userName;
$allLoas = DB::table('list_of_loa')->where('accountHolderUserName', $userName)
->where('status', 'Pending')
->get();

$approaching = $allLoas->filter(function ($loa) use ($today, $nextWeek) {
    try {
        $deadline = Carbon::parse($loa->deadlineOfCompletion);
        return $deadline->greaterThan($today) && $deadline->lessThanOrEqualTo($nextWeek);
    } catch (\Exception $e) {
        return false; // skip invalid dates
    }
});



 return view('approachingTheDeadlineSubmitter', compact('approaching'));

}

}
