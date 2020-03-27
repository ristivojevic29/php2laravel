<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Artikli;
class PostController extends FrontController
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

    public function show(Request $request,$id){

        try {


            $artikal = $this->model->getSingleArticle($id);
            $comments = $this->model->getCommentsForArticle($id);
            $this->data["singlePost"] = $artikal;
            $this->data["comments"] = $comments;
            $this->model->addVisitOnPost($id, $request->ip());
            return view("home.pages.single-post", $this->data);
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }
}
