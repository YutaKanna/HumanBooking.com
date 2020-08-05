<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use Illuminate\Httpe\Request;
use App\Planner;

class PlannerController extends Controller
{
    public function index()
    {
        $planners = Planner::all();
        return view('planners.index', ['planners' => $planners]);
    }
}
