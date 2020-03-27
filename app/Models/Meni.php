<?php

namespace app\Models;
class Meni{
    function dohvatiMeni(){
        return \DB::table('meni')->get();
    }
    function ubaciMeni($nazivMenija,$nazivRute){
        return \DB::table("meni")->insert(["imeMenija"=>$nazivMenija,"rutaMenija"=>$nazivRute]);
    }
    function delete($id){
        return \DB::table("meni")->where("idMeni",$id)->delete();
    }
    function find($id){
        return \DB::table("meni")->where("idMeni",$id)->first();
    }
    function update($id,$nazivMenija,$nazivRute){
        return \DB::table("meni")->where("idMeni",$id)->update(["imeMenija"=>$nazivMenija,"rutaMenija"=>$nazivRute]);
    }
}
