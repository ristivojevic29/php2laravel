<?php

namespace app\Models;
class Kategorije{
    public function dohvatiKategorije(){
        return \DB::table("kategorije")->select('kategorije.*',\DB::raw('COUNT(artikli.idKategorije) as broj'))
            ->leftJoin("artikli","kategorije.idKategorije","=","artikli.idKategorije")
        ->groupBy("kategorije.idKategorije")
        ->get();
    }
    public function ubaciKategoriju($naziv){
        return \DB::table("kategorije")->insert(["naziv_kategorije"=>$naziv]);
    }

}
