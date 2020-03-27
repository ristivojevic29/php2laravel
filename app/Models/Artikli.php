<?php
namespace app\Models;


class Artikli
{
    private $table='artikli';
    public $idSlike;
    public function getAllArticles($start,$number_per_page){
        return \DB::table("korisnici")->select('artikli.*','slike.*','kategorije.naziv_kategorije','korisnici.ime_korisnika','korisnici.prezime_korisnika')
            ->join("artikli","korisnici.idKorisnik","=","artikli.idAdmin")
            ->join("kategorije","artikli.idKategorije","=","kategorije.idKategorije")
            ->join("slike","artikli.idSlike","=","slike.idSlike")
            ->orderBy("artikli.datum","desc")
            ->offset($start)
            ->limit($number_per_page)
            ->get();

    }
    public function getNumberOfArticles(){
        return \DB::table("artikli")->count("*");
    }
    public function getNumberOfArticlesForCategory($id){
        return \DB::table("artikli")->where("idKategorije",$id)->count("*");
    }
    public function getNumberOfArticlesWithSearch($tekst){
        return \DB::table("artikli as a")
            ->join("korisnici as kr","a.idAdmin","=","kr.idKorisnik")
            ->where("a.naslov","LIKE","%$tekst%")
            ->orWhere("kr.ime_korisnika","LIKE","%$tekst%")
            ->orWhere("kr.prezime_korisnika","LIKE","%$tekst%")
            ->count("*");
    }
    public function getAllArticlesWithoutPaginate(){
        return \DB::table("artikli as a")
            ->join("kategorije as k","a.idKategorije","=","k.idKategorije")
            ->join("slike as s","a.idSLike","=","s.idSlike")
            ->get();
    }

    public function getSingleArticle($id)
    {
        return \DB::table("korisnici")->select('artikli.*','slike.*','kategorije.naziv_kategorije','korisnici.ime_korisnika','korisnici.prezime_korisnika', \DB::raw("(SELECT count(id) FROM posete WHERE idArtikla = $id) as posete"))
            ->join("artikli","korisnici.idKorisnik","=","artikli.idAdmin")
            ->join("kategorije","artikli.idKategorije","=","kategorije.idKategorije")
            ->join("slike","artikli.idSlike","=","slike.idSlike")
            ->where("artikli.idArtikla","=",$id)
            ->get();
    }

    public function getCommentsForArticle($id){
        return \DB::table("komentari as c")->join("korisnici as kr","c.idKorisnik","=","kr.idKorisnik")->where("c.idArtikla",$id)->get();
    }
    public function sliderArticles(){
        return \DB::table("artikli as a")
            ->join("kategorije as k","a.idKategorije","=","k.idKategorije")
            ->join("slike as s","a.idSlike","=","s.idSlike")
            ->orderBy("a.datum","asc")
            ->get();

    }
    public function filterArticles($id,$start,$number_per_page){
        return \DB::table("korisnici as kr")->join("artikli as a","kr.idKorisnik","=","a.idAdmin")
            ->join("kategorije as k","a.idKategorije","=","k.idKategorije")
            ->join("slike as s","a.idSlike","=","s.idSlike")
            ->where("a.idKategorije",$id)
            ->orderByDesc("a.datum")
            ->offset($start)
            ->limit($number_per_page)
            ->get();

    }
    public function insertArticle($naslov,$tekst,$idKategorije,$idSlike){
        return \DB::table("artikli")->insert([
           "naslov"=>$naslov,
           "tekst"=>$tekst,
           "datum"=>date("Y-m-d H:i:s"),
           "idKategorije"=>$idKategorije,
           "idAdmin"=>session()->get("user")->idKorisnik,
           "idSlike"=>$idSlike
        ]);
    }
    public function deleteArticle($id){
        return \DB::table("artikli")->where("idArtikla",$id)->delete();
    }
    public function findArticle($id){
        return \DB::table("artikli")->join("slike","artikli.idSlike","=","slike.idSlike")->join("kategorije","artikli.idKategorije","=","kategorije.idKategorije")->where("idArtikla",$id)->first();
    }
    public function update($id,$naslov,$tekst,$idKategorije,$idSlike)
    {
        $updateData = [
            'naslov' => $naslov,
            'tekst' => $tekst,
            'idKategorije' => $idKategorije,
            'idAdmin'=>session()->get("user")->idKorisnik
        ];
        if ($idSlike != null) {
            $updateData['idSlike'] = $idSlike;
        }
        return \DB::table("artikli")
            ->where('idArtikla', $id)
            ->update($updateData);
    }
    public function dohvatiIdSlike($id){
        return \DB::table("artikli")
            ->where('idArtikla', $id)
            ->select("artikli.idSlike as id")
            ->get()->first()->id;

    }
    public function filterBySearch($tekst,$start,$number_per_page){
        return \DB::table("korisnici as kr")
            ->join("artikli as a","kr.idKorisnik","=","a.idAdmin")
            ->join("kategorije as k","a.idKategorije","=","k.idKategorije")
            ->join("slike as s","a.idSlike","=","s.idSlike")
            ->where("a.naslov","LIKE","%$tekst%")
            ->orWhere("kr.ime_korisnika","LIKE","%$tekst%")
            ->orWhere("kr.prezime_korisnika","LIKE","%$tekst%")
            ->orderByDesc("a.datum")
            ->offset($start)
            ->limit($number_per_page)
            ->get();
    }
    public function addVisitOnPost($id, $ip)
    {
        return \DB::table("posete")
            ->insert([
                'ip' => $ip,
                'idArtikla' => $id
            ]);
    }
    public function dohvatiTriNajpopularnijaPosta(){
        return \DB::table("korisnici")
            ->select('artikli.*','slike.*','kategorije.naziv_kategorije','korisnici.ime_korisnika','korisnici.prezime_korisnika',
                \DB::raw("(SELECT count(*) FROM posete WHERE artikli.idArtikla = posete.idArtikla) as brojPoseta"))
            ->join("artikli","korisnici.idKorisnik","=","artikli.idAdmin")
            ->join("kategorije","artikli.idKategorije","=","kategorije.idKategorije")
            ->join("slike","artikli.idSlike","=","slike.idSlike")
            ->join("posete","artikli.idArtikla","=","posete.idArtikla")
            ->orderBy("brojPoseta","desc")
            ->groupBy("brojPoseta")
            ->limit(3)
            ->get();
    }

}
