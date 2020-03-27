<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akcije;
use App\Models\Meni;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Mockery\Exception;
use PHPUnit\Util\Json;

class NavigationController extends BackendController
{
    /**
     * @var Meni
     */
    private $model;
    /**
     * @var Akcije
     */
    private $akcije;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->model=new Meni();
        $this->akcije=new Akcije();
    }

    public function index()
    {
        //
        $this->data["navigacija"]=$this->model->dohvatiMeni();
        $this->data["form"]="insert";
        return view("admin.pages.navigation",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $imeMenija = $request->get("nazivMenija");
            $imeRute = $request->get("nazivRute");

            try {

                $this->model->ubaciMeni($imeMenija, $imeRute);
                $meni = $this->model->dohvatiMeni();
                $this->akcije->zabeleziAkciju("create nav");
                return \Psy\Util\Json::encode($meni);
            } catch (QueryException $e) {
                \Log::error($e->getMessage());
                return \response([$e->getMessage()], 404);

            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $this->data["form"] = "edit";
        try {
            $meni = $this->model->find($id);
            return \Psy\Util\Json::encode($meni);
        } catch (QueryException $e) {
            \Log::error($e->getMessage());
            return \response([$e->getMessage()], 404);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        if ($request->ajax()) {
            $nazivMenija = $request->get("nazivMenija");
            $nazivRute = $request->get("nazivRute");
            try {
                $this->model->update($id, $nazivMenija, $nazivRute);
                $this->akcije->zabeleziAkciju("update nav");
                $meni = $this->model->dohvatiMeni();
                return \Psy\Util\Json::encode($meni);
            } catch (QueryException $e) {
                \Log::error($e->getMessage());
                return \response([$e->getMessage()], 404);

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            $this->model->delete($id);
            $meni=$this->model->dohvatiMeni();
            $this->akcije->zabeleziAkciju("delete nav");
            return \Psy\Util\Json::encode($meni);
        }catch(QueryException $e) {
        \Log::error($e->getMessage());
        return \response([$e->getMessage()],404);
    }
    }
}
