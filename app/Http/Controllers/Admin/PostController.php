<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\InsertPostRequest;
use App\Models\Akcije;
use App\Models\Artikli;
use App\Models\Slike;
use App\Models\Kategorije;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Mockery\Exception;
use Psy\Util\Json;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PostController extends BackendController
{
    //
    /**
     * @var Artikli
     */
    private $model;
    /**
     * @var Kategorije
     */
    private $kategorije;
    /**
     * @var Akcije
     */
    private $akcije;

    public function __construct()
    {
        parent::__construct();
        $this->model=new Artikli();
        $this->kategorije=new Kategorije();
        $this->akcije=new Akcije();
    }

    public function index()
    {
        try {
            $postovi = $this->model->getAllArticlesWithoutPaginate();
            $this->data["artikli"] = $postovi;

            return view("admin.pages.allPosts", $this->data);
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }
    public function create()
    {
        try {
            $kategorije = $this->kategorije->dohvatiKategorije();
            $this->data["kategorije"] = $kategorije;
            $this->data["form"] = 'insert';
            return view("admin.pages.addPost", $this->data);
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }
    public function insertCategory(CategoryRequest $request){
        if($request->ajax()){
            $naziv=$request->get("nazivKategorije");
            try{
                $this->kategorije->ubaciKategoriju($naziv);
                $kat=$this->kategorije->dohvatiKategorije();
                $this->akcije->zabeleziAkciju("create category");
                return Json::encode($kat);
            }catch (Exception $e){

            }
        }
    }
    public function insertPost(Request $request){

        $rules = [
            'title' => 'required|min:3|max:100',
            'postText' => 'required',
            'slika' => 'required|max:2000',
            'ddKat' => 'required|not_in:0'
        ];
       $messages=[
           "ddKat.not_in"=>"Article category must be selected",
           "title.required"=>"Title must be filled",
           "postText.required"=>"Text field must be filled",
           "slika.required"=>"Image must be filled"
       ];
        $request->validate($rules,$messages);
        $file = $request->file('slika')->getClientOriginalName();
        $directory = public_path("img/gallery/");;
        $request->file("slika")->move($directory,$file);
        $fileName = time() . "_" . $file;
        $slike = new Slike();

        $novaPutanja="img/gallery/".$file;
        $idSlike=$slike->ubaciSliku($novaPutanja);

        $idKategorije=$request->get("ddKat");
        $naslov=$request->get("title");
        $tekst=$request->get("postText");

        try{
            $this->model->insertArticle($naslov,$tekst,$idKategorije,$idSlike);
            $this->akcije->zabeleziAkciju("create post");
           return redirect()->back()->with("success", "Post successfully added!");
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }
    public function delete(Request $request,$id){

        if($request->ajax()){
            try{
                $this->model->deleteArticle($id);
                $this->akcije->zabeleziAkciju("delete post");
                $artikli=$this->model->getAllArticlesWithoutPaginate();
                return Json::encode($artikli);
            }catch(QueryException $e) {
                \Log::error($e->getMessage());
                return \response([$e->getMessage()],404);
            }
        }
    }
    public function show($id){
        $kategorije=$this->kategorije->dohvatiKategorije();
        $this->data["kategorije"]=$kategorije;
        $this->data['form'] = 'edit';
        try {
            $artikal = $this->model->findArticle($id);
            if ($artikal) {
                $this->data['artikal'] = $artikal;
                return view("admin.pages.addPost", $this->data);
            } else {
                return redirect()->back()->with("error","Article does not exist");
            }
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error","Something went wrong");
        }

    }
    public function update(Request $request,$id){

        $rules = [
            'title' => 'required|min:3|max:100',
            'postText' => 'required',
            'slika' => 'nullable|max:2000',
            'ddKat' => 'required|not_in:0'
        ];
        $messages=[
            "ddKat.not_in"=>"Article category must be selected",
            "title.required"=>"Title must be filled",
            "postText.required"=>"Text field must be filled",
            "slika.required"=>"Image must be filled"
        ];

         $request->validate($rules,$messages);
        $idSlike=null;
        $staraSlika = null;
        if ($request->hasFile('slika')) {
            try{
            $staraSlika = $this->model->dohvatiIdSlike($id);
                $file = $request->file('slika');
                $directory = public_path("img/gallery/");;
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->move($directory,$fileName);

                $slike = new Slike();
                $novaPutanja="img/gallery/".$fileName;
                $idSlike=$slike->ubaciSliku($novaPutanja);

        }catch (QueryException $e) {
                \Log::error("Greska pri update-u objave: " . $e->getMessage());
            } catch (FileException $e) {
                \Log::error("Greska pri update-u objave u dodavanju slike: " . $e->getMessage());
            }

        $idKategorije=$request->get("ddKat");
        $naslov=$request->get("title");
        $tekst=$request->get("postText");
        try {
            $this->model->update($id,$naslov,$tekst,$idKategorije,$idSlike);
            $this->akcije->zabeleziAkciju("update post");
            try {
                if($staraSlika) {
                    $pictureModel = new Slike();
                    $picture = $pictureModel->find($staraSlika);
                    unlink(public_path($picture->file));
                    $slike->obrisiSliku($staraSlika);
                }
            } catch(\Exception $e) {
                \Log::error("Greska pri brisanju slike:" . $e->getMessage());
            }
            return redirect(route("posts.index"))->with("success", "Post successfully edited!");
            } catch(FileException $e) {
            \Log::error("Error with upload: " . $e->getMessage());

        }


        }
    }
}
