<?php


namespace App\Models;


class Korisnici
{
    public function getAllUsers(){
        return \DB::table("korisnici as k")->join("uloge as u","k.uloge_id","=","u.idUloge")->get();
    }
    public function insertUser($ime,$prezime,$email,$password,$idUloge){
        return \DB::table("korisnici")->insert(["ime_korisnika"=>$ime,"prezime_korisnika"=>$prezime,"email"=>$email,"lozinka"=>md5($password),"uloge_id"=>$idUloge]);
    }
    public function deleteUser($id){
        return \DB::table("korisnici")->where("idKorisnik",$id)->delete();
    }
    public function findUser($id){
        return \DB::table("korisnici as k")->join("uloge as u","k.uloge_id","=","u.idUloge")->where("idKorisnik",$id)->first();
    }
    public function updateUser($id,$ime,$prezime,$email,$lozinka,$idUloge){
        return \DB::table("korisnici")
            ->where("idKorisnik",$id)
            ->update(["ime_korisnika"=>$ime,"prezime_korisnika"=>$prezime,"email"=>$email,"lozinka"=>md5($lozinka),"uloge_id"=>$idUloge]);
    }
    public function getNumberOfUsers(){
        return \DB::table("korisnici")->count("*");
    }
    public function activeUsers(){
        return \DB::table("korisnici")->where("aktivan","=",1)->get();
    }
}
