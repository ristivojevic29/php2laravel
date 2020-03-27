<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminMeni;
use App\Models\Meni;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    //
    protected $data;
    public function __construct()
    {
        try {
            $model = new AdminMeni();
            $meni = $model->getAll();
            $model2 = new Meni();
            $meni2 = $model2->dohvatiMeni();
            $this->data["sajtMeni"] = $meni2;
            $this->data["adminMeni"] = $meni;
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }

}
