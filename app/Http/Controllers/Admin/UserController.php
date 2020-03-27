<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akcije;
use App\Models\Korisnici;
use App\Models\Uloge;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Mockery\Exception;
use PHPUnit\Util\Json;

class UserController extends BackendController
{
    /**
     * @var Korisnici
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
        $this->model=new Korisnici();
        $this->akcije=new Akcije();
    }

    public function index()
    {
        //
        try {
            $this->data["korisnici"] = $this->model->getAllUsers();
            return view("admin.pages.users", $this->data);
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {


            $model = new Uloge();
            $uloge = $model->dohvatiUloge();
            $this->data["uloge"] = $uloge;
            $this->data["form"] = "insert";
            return view("admin.pages.addUser", $this->data);
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $rules = [
            'ime_korisnika' => 'required|alpha|min:2|max:20',
            'prezime_korisnika' => 'required|alpha|min:2|max:20',
            'email' => "required|unique:korisnici|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/",
            'lozinka' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{8,}$/',
            'uloge_id' => 'required'
        ];
        $messages = [
            "lozinka.regex" => 'Password must contain one uppercase letter and one number.',
            "lozinka.required"=>"Password must be filled",
            'uloge_id.required' => 'User role must be selected.',
            'email.required'=>'Email must be filled',
            'prezime_korisnika.required'=>'Last name is empty',
            'ime_korisnika.required'=>'First name is empty',
            "email.unique"=>'Email is taken by someone else'
        ];



        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();
        $ime=$request->get("ime_korisnika");
        $prezime=$request->get("prezime_korisnika");
        $email=$request->get("email");
        $password=$request->get("lozinka");
        $uloge=$request->get("uloge_id");
        try{
            $this->model->insertUser($ime,$prezime,$email,$password,$uloge);
            $this->akcije->zabeleziAkciju("create user");
            return redirect(route("user.index"))->with("success", "User successfully added!");
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $this->data["form"]="edit";
        $model=new Uloge();
        $uloge=$model->dohvatiUloge();
        $this->data["uloge"]=$uloge;
        try{
            $korisnik=$this->model->findUser($id);
            $this->data["korisnik"]=$korisnik;
            return view("admin.pages.addUser",$this->data);
        }catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'ime_korisnika' => 'required|alpha|min:2|max:20',
            'prezime_korisnika' => 'required|alpha|min:2|max:20',
            'email' => "required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/",
            'lozinka' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{8,}$/',
            'uloge_id' => 'required'
        ];
        $messages = [
            "lozinka.regex" => 'Password must contain one uppercase letter and one number.',
            "lozinka.required"=>"Password must be filled",
            'uloge_id.required' => 'User role must be selected.',
            'email.required'=>'Email must be filled',
            'prezime_korisnika.required'=>'Last name is empty',
            'ime_korisnika.required'=>'First name is empty',
            "email.unique"=>'Email is taken by someone else'
        ];


        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();


        $korisnici = new Korisnici();
         $ime=$request->get('ime_korisnika');
         $prezime=$request->get("prezime_korisnika");
         $email=$request->get('email');
         $lozinka=$request->get("lozinka");
         $uloga=$request->get("uloge_id");

        try {
            $this->akcije->zabeleziAkciju("update user");
            $korisnici->updateUser($id,$ime,$prezime,$email,$lozinka,$uloga);
            return redirect(route("user.index"))->with("success", "User successfully updated!");
        } catch(QueryException $e) {
        \Log::error($e->getMessage());
        return redirect()->back()->with("error", "An server error has occurred, please try again later.");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        if($request->ajax()){
            try{
                $this->model->deleteUser($id);
                $korisnici=$this->model->getAllUsers();
                $this->akcije->zabeleziAkciju("delete user");
                return \Psy\Util\Json::encode($korisnici);
            }catch(QueryException $e) {
                \Log::error($e->getMessage());
                return \response([$e->getMessage()],409);
            }

        }
    }
}
