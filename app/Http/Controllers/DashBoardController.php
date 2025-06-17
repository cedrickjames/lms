<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class DashBoardController extends Controller
{

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
