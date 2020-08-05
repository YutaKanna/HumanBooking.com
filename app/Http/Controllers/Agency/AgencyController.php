<?php

namespace App\Http\Controllers\Agency;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Httpe\Request;
use App\Agency;

class AgencyController extends Controller
{
    public function index()
    {
        $agencies = Agency::all();
        // 下2行はcomposerに移す
        $agency = Auth::user();
        $unreadNotifications = $agency->unreadNotifications;

        return view('agencies.index', compact('agencies', 'agency', 'unreadNotifications'));
    }
}
