<?php


namespace App\Models;


class Slike
{

    public function ubaciSliku($putanja){
        return \DB::table("slike")
            ->insertGetId([
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'putanja_slike'=>$putanja,
            ]);
    }
    public function find($id){
           return \DB::table("slike")
                ->where('idSlike', $id)
                ->get()
                ->first();

    }
    public function obrisiSliku($id){
        return \DB::table("slike")->where("idSlike",$id)
            ->delete();
    }
}
