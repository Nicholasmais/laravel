<?php

namespace App\Http\Controllers;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $req){
        $number = (int) $req->query(key : 'id');
        $series = \DB::table('series')
                        ->where([
                            ['serie', '<>', 'opaa'],
                            ['createdAt', '>', date('2024-12-31')]
                            ])
                        ->orderBy("serie", "asc")
                        ->select("serie")
                        ->get();

        return view("series.index")->with("series", $series);            
    }

    public function create(){
        return view(view: "series.create");
    }

    public function store(Request $req){
        $name = $req->input('name');
        $serie = new Serie();
        $serie->serie = $name;
        $serie->save();

        return redirect('/series/');       
    }
}
