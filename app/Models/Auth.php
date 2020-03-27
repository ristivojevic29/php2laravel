<?php
namespace app\Models;

class Auth{
    public function insertUser($userData){

       return \DB::table('korisnici')->insert(["ime_korisnika"=>$userData["firstName"],
            "prezime_korisnika"=>$userData["lastName"],
            "email"=>$userData["email"],"lozinka"=>md5($userData["password"]),
            "created_on"=>date('Y-m-d H:i:s'),"aktivan"=>0,"uloge_id"=>2]);
    }
    public function loginUser($userData){
        return \DB::table('korisnici as k')->select("k.*","u.*")->join("uloge as u","k.uloge_id","=","u.idUloge")->where([['email',$userData['email']],
                ['lozinka',md5($userData['password'])]
            ])->get()->first();
    }
    public function changeActivityAfterLogIn($id,$aktivnost){
        return \DB::table("korisnici")->where("idKorisnik",$id)->update(["aktivan"=>$aktivnost]);
    }
}
