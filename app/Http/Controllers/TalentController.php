<?php

namespace App\Http\Controllers;

use App\Talent;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    public function index()
    {
        $talents = Talent::all();
        return view('talents.index', ['talents' => $talents]);
    }

    public function show(Talent $talent)
    {
        return view('talents.show', compact('talents'));
    }
}
