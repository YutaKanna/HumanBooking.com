<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;
use Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        // 下2行はcomposerに移す
        $agency = Auth::user();
        $unreadNotifications = $agency->unreadNotifications;

        $agency = Auth::user();
        $notifications = [];
        foreach ($agency->unreadNotifications as $notification) {
            $data = $notification->data;
            $array = [
                'id' => $notification->id,
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
        return view('notifications.index', compact('agency', 'unreadNotifications', 'notifications'));
    }

    public function show(Talent $talent)
    {
        return view('notifications.show', compact('talent'));
    }
}
