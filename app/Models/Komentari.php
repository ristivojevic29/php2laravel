<?php
namespace app\Models;
use phpDocumentor\Reflection\Types\Null_;

class Komentari{

    public function ubaciKomentar($sadrzaj,$idArtikla,$idParent=0){
        return \DB::table("komentari")->insert(["idKorisnik"=>session()->get("user")->idKorisnik,
            "idArtikla"=>$idArtikla,"tekst"=>$sadrzaj,"vreme"=>date('Y-m-d H:i:s'),"idKomentarParent"=>$idParent
            ]);
    }

    public function dohvatiKomentare($idArtikla){
        return \DB::table("komentari as c")->join("korisnici as kr","c.idKorisnik","=","kr.idKorisnik")->where("c.idArtikla",$idArtikla)->get();
    }
    public function dohvatiBrojKomentara(){
        return \DB::table("komentari")->count("*");
    }
    public function dohvatiSveKomentate(){
        return \DB::table("komentari as c")->select("c.*","kr.*","c.tekst as komentar")->join("korisnici as kr","c.idKorisnik","=","kr.idKorisnik")->join("artikli as a","c.idArtikla","=","a.idArtikla")->get();
    }
    public function obrisiKomentar($id){
        return \DB::table("komentari")->where("idKomentara",$id)->delete();
    }
}
