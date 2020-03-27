<?php


namespace App\Models;


class Akcije
{

    public function zabeleziAkciju($akcija){
        return \DB::table("akcije")->insert(["datum_akcije"=>date('Y-m-d H:i:s'),"akcija"=>$akcija]);
    }
    public function dohvatiAkcije(){
        return \DB::table("akcije")->get();
    }
    public function dohvatiAkcijuPoDatumu($datum){
        return \DB::table("akcije")->where("datum_akcije","LIKE","$datum%")->get();
    }
}
