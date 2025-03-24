<?php

namespace App\Http\Controllers;
use App\Models\Serie;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SeriesController extends Controller
{
    public function index(Request $req){
        $number = (int) $req->query(key : 'id');
        $series = \DB::table('series')
                        ->where([
                            ['serie', '<>', 'opaa'],
                            ['created_at', '>', Carbon::parse('2024-12-31')]
                            ])
                        ->whereBetween('updated_at', [
                            Carbon::createFromFormat('Y-m-d', '2025-01-01')->startOfDay(),
                            Carbon::createFromFormat('Y-m-d', '2025-12-31')->endOfday()
                        ])
                        ->orderBy("serie", "desc")
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
