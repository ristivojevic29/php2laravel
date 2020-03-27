<?php

namespace App\Http\Controllers;
use App\Models\Akcije;
use App\Models\Komentari;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Mockery\Exception;
use Psy\Util\Json;

class CommentsController extends FrontController
{
    //
    /**
     * @var Komentari
     */
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model=new Komentari();
    }

    public function postComment(Request $request)
    {

        if ($request->ajax()) {
            $sadrzaj = $request->get("tekst");
            $idArtikla = $request->get("idArtikla");
            $idParent=$request->get("idParent");
            try {
                $this->model->ubaciKomentar($sadrzaj, $idArtikla,$idParent);
                $dohvatiSve = $this->model->dohvatiKomentare($idArtikla);
                $model2=new Akcije();
                $model2->zabeleziAkciju("create comment");
                return Json::encode($dohvatiSve);

            } catch(QueryException $e) {
                \Log::error($e->getMessage());
                return \response("An server error has occurred, please try again later.",404);
            }

        }
    }


}
