<?php


namespace App\Models;


class AdminMeni
{
    public function getAll(){
        return \DB::table("adminmeni")->get();
    }
}
