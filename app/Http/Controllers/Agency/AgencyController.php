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
        $agency = Auth::user();
        $unreadNotifications = $agency->unreadNotifications;

        $notifications = [];
        foreach ($agency->unreadNotifications as $notification) {
            $data = $notification->data;
            $array = [
                'data' => $notification->data,
            ];
            array_push($notifications, $array);
        }


        // viewではこんな感じで表示
        // foreach ($notifications as $key => $notify) {
        //     $hoge = $notifications[$key]['data']['talent_id'];
        //     dd($hoge);

        //     // フォーマット
        //     dd($notifications[0]['data']['talent_id']);
        // }

        return view('agencies.index', compact('agencies', 'unreadNotifications', 'notifications'));
    }
}
