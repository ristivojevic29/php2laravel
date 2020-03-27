<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikli;
use Mockery\Exception;
use Psy\Util\Json;

class HomeController extends FrontController
{
    //
    /**
     * @var Artikli
     */
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model=new Artikli();
    }

    public function index(Request $request){
        try {
            $start = 0;
            $number_per_page = 4;
            $page = $request->get("strana");
            if ($page > 0) {
                $start = ($page - 1) * $number_per_page;
                $artikli = $this->model->getAllArticles($start, $number_per_page);
                return Json::encode($artikli);
            }
            $artikliPHP = $this->model->getAllArticles($start, $number_per_page);
            $this->data["artikli"] = $artikliPHP;

            $slajderArtikli = $this->model->sliderArticles();
            $popularniPostovi=$this->model->dohvatiTriNajpopularnijaPosta();
            $this->data["popularniPostovi"]=$popularniPostovi;
            $this->data["slajderArtikli"] = $slajderArtikli;
            return view("home.pages.index", $this->data);
        }
        catch(Exception $e){
            return \response(["message"=>$e->getMessage()],404);
        }
    }

    public function brojArtikala(Request $request){
        try {
            if ($request->ajax()) {

                $id = $request->get("katId");
                $uneto = $request->get("uneto");
                if ($id > 0) {

                    $cat = $this->model->getNumberOfArticlesForCategory($id);
                    return Json::encode($cat);
                } else if ($uneto != "" && $id == 0) {
                    $uneti = $this->model->getNumberOfArticlesWithSearch($uneto);
                    return Json::encode($uneti);
                } else {
                    $broj = $this->model->getNumberOfArticles();
                    return Json::encode($broj);
                }
            }
        }catch(Exception $e){
            return \response(["message"=>$e->getMessage()],404);
        }

    }

    public function filterArticles(Request $request,$id){

        try{

            $start=0;
            $number_per_page=4;
            $page=$request->get("strana");
            if($page>0 && $id!=0){
                $start=($page-1)*$number_per_page;
                $filtriraniArtikli=$this->model->filterArticles($id,$start,$number_per_page);
                return Json::encode($filtriraniArtikli);
            }else{
                $filtriraniArtikli=$this->model->filterArticles($id,$start,$number_per_page);
                return Json::encode($filtriraniArtikli);
            }
        }catch(Exception $e){
            return \response(["message"=>$e->getMessage()],404);
        }
    }
    public function filterBySearch(Request $request){
        try{
        if($request->ajax()) {
            $start = 0;
            $number_per_page = 4;
            $page = $request->get("strana");
            $tekst = $request->get("uneto");
            if ($page > 0 && $tekst != "") {

                $start = ($page - 1) * $number_per_page;
                $filtriraniPoSearch = $this->model->filterBySearch($tekst, $start, $number_per_page);
                return Json::encode($filtriraniPoSearch);
            } else {
                $filtriraniPoSearch = $this->model->filterBySearch($tekst, $start, $number_per_page);
                return Json::encode($filtriraniPoSearch);
            }
        }

            }catch(Exception $e){
            return \response(["message"=>$e->getMessage()],404);
        }
    }
}
