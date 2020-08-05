<?php

namespace App\Http\Controllers;

use App\Notifications\Offered;
use App\Offer;
use App\Project;
use App\Talent;
use App\Agency;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        $talents = Talent::all();
        return view('projects.create', ['talents' => $talents]);
    }

    public function store(Request $request)
    {
        $project = new Project;
        $project->name = $request->project_name;
        $project->save();

        $offer = new Offer;
        $project->offer()->save($offer);

        // 中間テーブルにoffer、タレントのidを保存できるようにする
        // 選択されたタレントの数だけループさせる
        foreach ($request->talents as $talentId) {
            $offer->talents()->attach($talentId);

            // タレントが所属する事務所を一回変数に格納
            // 一旦は都度通知で良い
            $talent = Talent::find($talentId);
            $agency = $talent->agency;
            $agency->notify(new Offered($talent, $offer));
        }

        return redirect()->route('talents.index')->with('success_message', ('登録完了しました'));
    }
}
