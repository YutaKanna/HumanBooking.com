<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Project;
use App\Talent;
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
        // $hoge = $request->talents;
        // dd($hoge);
        $project = new Project;
        $project->name = $request->project_name;
        $project->save();

        // $offer = Project::find($project->id)->offer()->;
        $offer = new Offer;
        $project->offer()->save($offer);

        // 中間テーブルにoffer、タレントのidを保存できるようにする
        // 選択されたタレントの数だけループさせる
        foreach ($request->talents as $talentId) {
            $offer->talents()->attach($talentId);
        }

        return redirect()->route('talents.index')->with('success_message', ('登録完了しました'));
    }
}
