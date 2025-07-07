<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SubmitterDashboardController extends Controller
{
    
public function showListOfLoa()
{

$today = Carbon::today('Asia/Manila');
$allLoas = DB::table('list_of_loa')
->where('status', 'Pending')
->get();

$overdueLoas = $allLoas->filter(function ($loa) use ($today) {
    $deadline = Carbon::parse($loa->deadlineOfCompletion);
    return $deadline->lt($today);
});


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


  $allSubmitted = DB::table('submitted_requirements')
    ->whereDate('created_at', Carbon::today('Asia/Manila'))
    ->get();


$now = Carbon::now('Asia/Manila');
$oneHourAgo = Carbon::now('Asia/Manila')->subHour();

$recentApproved = DB::table('submitted_requirements')
->join('users', 'submitted_requirements.approvedById', '=', 'users.userName')
    ->where('submitted_requirements.status', 'Completed')
    ->where('submitted_requirements.accountHolderUserName', Auth::user()->userName)
    ->whereBetween('submitted_requirements.updated_at', [$oneHourAgo, $now])
           ->select('submitted_requirements.*', 'users.profilePicture')
    ->get();

 $recentFiled = DB::table('list_of_loa')
 ->join('users', 'list_of_loa.filedById', '=', 'users.userName')
    ->where('list_of_loa.accountHolderUserName', Auth::user()->userName)
    ->whereBetween('list_of_loa.created_at', [$oneHourAgo, $now])
     ->select('list_of_loa.*', 'users.profilePicture')
    ->get();


$todayNotif = DB::table('submitted_requirements')
->join('users', 'submitted_requirements.approvedById', '=', 'users.userName')
    ->where('submitted_requirements.status', 'Completed')
    ->where('submitted_requirements.accountHolderUserName', Auth::user()->userName)
    ->whereDate('submitted_requirements.updated_at', $today)
    ->where('submitted_requirements.updated_at', '<=', $oneHourAgo)
       ->select('submitted_requirements.*', 'users.profilePicture')
    ->get();

$todayFiled = DB::table('list_of_loa')
->join('users', 'list_of_loa.filedById', '=', 'users.userName')
    ->where('list_of_loa.accountHolderUserName', Auth::user()->userName)
    ->whereDate('list_of_loa.created_at', $today)
    ->where('list_of_loa.created_at', '<=', $oneHourAgo)
           ->select('list_of_loa.*', 'users.profilePicture')
    ->get();



$yesterday = Carbon::yesterday('Asia/Manila')->endOfDay();

$old = DB::table('submitted_requirements')
->join('users', 'submitted_requirements.approvedById', '=', 'users.userName')
->where('submitted_requirements.status', 'Completed')
    ->where('submitted_requirements.accountHolderUserName', Auth::user()->userName)
    ->where('submitted_requirements.updated_at', '<=', $yesterday)
         ->select('submitted_requirements.*', 'users.profilePicture')
    ->get();

$oldFiled = DB::table('list_of_loa')
->join('users', 'list_of_loa.filedById', '=', 'users.userName')
    ->where('list_of_loa.accountHolderUserName', Auth::user()->userName)
     ->where('list_of_loa.created_at', '<=', $yesterday)
       ->select('list_of_loa.*', 'users.profilePicture')
    ->get();
 



    $today = Carbon::today('Asia/Manila');
$nextWeek = Carbon::today()->addDays(7);


$allLoasSubmitter = DB::table('list_of_loa')
->where('status', 'Pending')
->where('accountHolderUserName', Auth::user()->userName)
->get();

$approachingSubmitter = $allLoasSubmitter->filter(function ($loa) use ($today, $nextWeek) {
    try {
        $deadline = Carbon::parse($loa->deadlineOfCompletion);
        return $deadline->greaterThan($today) && $deadline->lessThanOrEqualTo($nextWeek);
    } catch (\Exception $e) {
        return false; // skip invalid dates
    }
});

$overdueLoasSubmitter = $allLoasSubmitter->filter(function ($loa) use ($today) {
    $deadline = Carbon::parse($loa->deadlineOfCompletion);
    return $deadline->lt($today);
});




 return view('submitter', compact('overdueLoas','approaching','todayNotif','recentApproved','old','approachingSubmitter','overdueLoasSubmitter','recentFiled','todayFiled','oldFiled'));

}
}
