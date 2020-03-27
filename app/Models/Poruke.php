<?php


namespace App\Models;


class Poruke
{
    public function insertMail($ime,$email,$subject,$message){
        return \DB::table("emails")->insert([
            "ime"=>$ime,
            "naslov"=>$subject,
            "poruka"=>$message,
            "email"=>$email
        ]);
    }
    public function allMails(){
        return \DB::table("emails")->get();
    }
    public function deleteMail($id){
        return \DB::table("emails")->where("id",$id)->delete();
    }
}
