<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
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

$recentSubmitted = DB::table('submitted_requirements')
->join('users', 'submitted_requirements.accountHolderUserName', '=', 'users.userName')
    ->whereBetween('submitted_requirements.created_at', [$oneHourAgo, $now])
    ->select('submitted_requirements.*', 'users.profilePicture')
    ->get();


$today = DB::table('submitted_requirements')
->join('users', 'submitted_requirements.accountHolderUserName', '=', 'users.userName')
    ->whereDate('submitted_requirements.created_at', $today)
    ->where('submitted_requirements.created_at', '<=', $oneHourAgo)
     ->select('submitted_requirements.*', 'users.profilePicture')
    ->get();



$yesterday = Carbon::yesterday('Asia/Manila')->endOfDay();

$old = DB::table('submitted_requirements')
    ->where('created_at', '<=', $yesterday)
    ->get();

    $old = DB::table('submitted_requirements')
     ->join('users', 'submitted_requirements.accountHolderUserName', '=', 'users.userName')
     ->where('submitted_requirements.created_at', '<=', $yesterday)
     ->select('submitted_requirements.*', 'users.profilePicture')
     ->get();



    $todayDate = Carbon::today('Asia/Manila');
$nextWeek = Carbon::today()->addDays(7);


$allLoasSubmitter = DB::table('list_of_loa')
->where('status', 'Pending')
->where('accountHolderUserName', Auth::user()->userName)
->get();

$approachingSubmitter = $allLoasSubmitter->filter(function ($loa) use ($todayDate, $nextWeek) {
    try {
        $deadline = Carbon::parse($loa->deadlineOfCompletion);
        return $deadline->greaterThan($todayDate) && $deadline->lessThanOrEqualTo($nextWeek);
    } catch (\Exception $e) {
        return false; // skip invalid dates
    }
});

$overdueLoasSubmitter = $allLoasSubmitter->filter(function ($loa) use ($todayDate) {
    $deadline = Carbon::parse($loa->deadlineOfCompletion);
    return $deadline->lt($todayDate);
});




 return view('home', compact('overdueLoas','approaching','today','recentSubmitted','old','approachingSubmitter','overdueLoasSubmitter'));

}


public function index()
{
    return view('deadlines.index'); // Your Blade view
}

public function getData()
{
    // $query = ApproachingDeadline::query();

    // return DataTables::of($query)
    //     ->addColumn('action', function ($row) {
    //         return '<a href="/edit/'.$row->id.'" class="btn btn-sm btn-primary">Edit</a>';
    //     })
    //     ->make(true);

    return DataTables::of(collect([]))->make(true); // empty collection

}

}
