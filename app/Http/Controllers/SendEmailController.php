<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BackendController;
use App\Models\Poruke;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class SendEmailController extends FrontController
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function contact(){
        return view("home.pages.contact",$this->data);
    }
    public function send(Request $request){
        $rules = [
            'name'=>"required",
            "email"=>"required|email",
            "subject"=>"required",
            "message"=>"required"
        ];
        $messages=[
            "name.required"=>"Name must be filled",
            "subject.required"=>"SUbject must be filled",
            "message.required"=>"Text field must be filled",
            "email.required"=>"Email must be filled"
        ];

        $request->validate($rules,$messages);


            $name=$request->get("name");
            $message=$request->get("message");
            $subject=$request->get("subject");
            $email=$request->get("email");

            try{
               $model=new Poruke();
               $model->insertMail($name,$email,$subject,$message);
               return redirect()->back()->with("success","Message sent");
            }catch (QueryException $e) {
            \Log::error("Erro with sending mail: " . $e->getMessage());
            return redirect()->back();
                }
    }

}
