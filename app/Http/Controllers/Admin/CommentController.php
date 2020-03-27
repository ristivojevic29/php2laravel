<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komentari;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Psy\Util\Json;

class CommentController extends BackendController
{
    //
    public function index(){
        try{
            $model=new Komentari();
            $this->data["komentari"]=$model->dohvatiSveKomentate();
            return view("admin.pages.comments",$this->data);
        }catch(QueryException $e){
            \Log::error($e->getMessage());
            return redirect()->back()->with("error","Something went wrong");
        }
    }
    public function destroy($id){
        try{
            $model=new Komentari();
            $model->obrisiKomentar($id);
            $komentari=$model->dohvatiSveKomentate();
            return Json::encode($komentari);
        }catch(QueryException $e){
            \Log::error($e->getMessage());
            return response([$e->getMessage()],404);
        }
    }
}
