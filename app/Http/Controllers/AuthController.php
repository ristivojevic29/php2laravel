<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Akcije;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Auth;
use Mockery\Exception;

class AuthController extends FrontController
{
    //
    /**
     * @var Auth
     */
    private $model;
   // private $belezenjeAkcija;
    /**
     * @var Akcije
     */
    private $model2;

    public function __construct()
    {
        parent::__construct();
        $this->model=new Auth();
        $this->model2=new Akcije();
    }
    public function login(){
        return view("home.pages.login",$this->data);
    }
    public function register(){
        return view("home.pages.register",$this->data);
    }
    public function doRegister(RegisterRequest $request){
        if($request->has("send")) {
            $userData = $request->all();
            unset($userData['_token']);
            try {
                $user = $this->model->insertUser($userData);
                if ($user) {
                    $this->model2->zabeleziAkciju("Create user");
                    return redirect()->back();
                } else {
                    return response(null, 409);
                }
            } catch(QueryException $e) {
                \Log::error($e->getMessage());
                return \response("An server error has occurred, please try again later.",422);
            }
        }
    }
    public function doLogin(LoginRequest $request){
        if($request->has("send")) {

            $userData = $request->all();
            unset($userData['_token']);
            try {
                $user = $this->model->loginUser($userData);
                if($user) {
                    $request->session()->put("user", $user);
                    $id=session()->get("user")->idKorisnik;
                    $aktivnost=1;
                    $this->model->changeActivityAfterLogIn($id,$aktivnost);
                    $this->model2->zabeleziAkciju("User logged in");
                    return $user->naziv_uloge == "Admin" ? redirect(route("dashboard.index")) : redirect(route("home"));
                }else{
                    return response(null,409);
                }
            } catch(QueryException $e) {
                \Log::error($e->getMessage());
                return \response("An server error has occurred, please try again later.",422);
            }
        }
    }
    public function logout(Request $request){
        $id=session()->get("user")->idKorisnik;
        $aktivnost=0;
        $this->model2->zabeleziAkciju("User logged out");
        $this->model->changeActivityAfterLogIn($id,$aktivnost);
        $request->session()->forget("user");
        $request->session()->flush(); // = destroy()
        return redirect("/login")->with("message", "Izlogovali ste se");
    }
}
