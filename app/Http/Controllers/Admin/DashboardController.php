<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikli;
use App\Models\Komentari;
use App\Models\Korisnici;
use Illuminate\Http\Request;

class DashboardController extends BackendController
{
    //
    private $model3;
    public function __construct()
    {
        parent::__construct();
        $this->model3=new Korisnici();
    }

    public function index(){
        $model=new Artikli();
        $model2=new Komentari();
        try {


            $brojPostova = $model->getNumberOfArticles();
            $this->data["brojPostova"] = $brojPostova;
            $brojKomentara = $model2->dohvatiBrojKomentara();
            $this->data["brojKomentara"] = $brojKomentara;
            $brojKorisnika = $this->model3->getNumberOfUsers();
            $this->data["brojKorisnika"] = $brojKorisnika;
            $this->data["aktivniKorisnici"] = $this->model3->activeUsers();
            return view("admin.pages.dashboard", $this->data);
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }
}
