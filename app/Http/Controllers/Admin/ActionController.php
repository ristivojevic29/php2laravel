<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akcije;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Mockery\Exception;
use PHPUnit\Util\Json;

class ActionController extends BackendController
{

    //
    public function index(){
        $model=new Akcije();
        $akcije=$model->dohvatiAkcije();
        $this->data["akcije"]=$akcije;
        return view("admin.pages.actions",$this->data);
    }
    public function filter(Request $request){
        if($request->ajax()){
            $datum=$request->get("datum");

            try{
                $model=new Akcije();
                $date=$model->dohvatiAkcijuPoDatumu($datum);
                return \Psy\Util\Json::encode($date);
            }catch(QueryException $e) {
                \Log::error($e->getMessage());
                return redirect()->back()->with("error", "An server error has occurred, please try again later.");
            }
        }
    }
}
