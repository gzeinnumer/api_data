<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;


use DB;
use Response;

class DataController extends Controller
{ 
    public function index(){
        return Data::all();
        // $schedule = DB::select('SELECT * FROM data WHERE id=1');
        // return \Response::json($schedule);
    }
}
