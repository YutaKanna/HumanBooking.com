<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Httpe\Request;
use App\Agency;

class AgencyController extends Controller
{
    public function index()
    {
        $agencies = Agency::all();
        return view('agencies.index', ['agencies' => $agencies]);
    }
}
