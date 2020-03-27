<?php


namespace App\Models;


class Uloge
{
    public function dohvatiUloge(){
        return \DB::table("uloge")->get();
    }
}
