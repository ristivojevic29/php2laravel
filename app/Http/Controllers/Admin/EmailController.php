<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poruke;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Psy\Util\Json;

class EmailController extends BackendController
{
    //
    public function index(){
        $model=new Poruke();
        try {
            $this->data["emails"] = $model->allMails();
            return view("admin.pages.emails", $this->data);
        }catch (QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error","Something went wrong");

        }
    }
    public function destroy($id)
    {
        $model = new Poruke();
        try {
            $model->deleteMail($id);
            $poruke=$model->allMails();
            return Json::encode($poruke);
        } catch (QueryException $e) {
            \Log::error($e->getMessage());
            return \response([$e->getMessage()], 404);

        }
    }
}
