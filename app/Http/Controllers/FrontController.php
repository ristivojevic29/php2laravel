<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Meni;
use App\Models\Kategorije;

class FrontController extends Controller
{
    //
    protected $data=[];

    public function __construct()
    {
        try {


            $model = new Meni();
            $kat = new Kategorije();
            $podaci = $model->dohvatiMeni();
            $kategorije = $kat->dohvatiKategorije();
            $this->data["meni"] = $podaci;
            $this->data["kategorije"] = $kategorije;
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }



}
