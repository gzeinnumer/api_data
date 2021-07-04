<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;


use DB;
use Response;

class DataController extends Controller
{ 
    //Route::get('/data', [DataController::class, 'index']);
    public function index(){
        return Data::all();
        // $schedule = DB::select('SELECT * FROM data WHERE id=1');
        // return \Response::json($schedule);
    }

    //Route::post('/data/store', [DataController::class, 'store']);
    public function store(Request $r)
    {
        $d = new Data();
        $d->nama = $r->nama;
        $d->no_telepon = $r->no_telepon;
        $d->created_at = date("Y-m-d H:i:s");
        $d->updated_at = date("Y-m-d H:i:s");
        $d->save();
        return response()->json(['pesan' => 'Data berhasil masuk', 'status' => true]);
    }

    public function update(Request $r, $id)
    {
        //select * from data where id = $id
        $d = Data::find($id);
        $d->nama = $r->nama;
        $d->no_telepon = $r->no_telepon;
        $d->updated_at = date("Y-m-d H:i:s");
        $d->save();

        return response()->json(['pesan' => 'Data berhasil diupdate', 'status' => true]);
    }

    public function delete($id)
    {
        $d = Data::find($id);
        //delete from table where id = $id;
        $d->delete();

        return response()->json(['pesan' => 'Data berhasil didelete', 'status' => true]);
    }

    public function getDataById($id)
    {
        $d = Data::find($id);
        return $d;
    }

    public function query($id)
    {
        $d = DB::select("SELECT d.nama, d.no_telepon, dd.alamat FROM data d left join data_detail dd on d.id=dd.data_id where d.id='$id'");
        return $d;
    }
}
