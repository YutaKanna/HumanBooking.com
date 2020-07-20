<?php

namespace App\Http\Controllers;

use App\Talent;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        $talents = Talent::all();
        return view('projects.create', ['talents' => $talents]);
    }

    public function store()
    {
        //
    }
}
