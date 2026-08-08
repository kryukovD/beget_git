<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Http;
class RequestFormController extends Controller
{
    public function send(Request $request){
       $form= new RequestForm();

       $token  = $request->input('recaptcha_token');

       $response = Http::asForm()->post(
           'https://www.google.com/recaptcha/api/siteverify',
           [
               'secret'   => '6LfNMiMrAAAAAHH5pvay3Q_TBDlh4uVf-0nn-dHc',
               'response' => $token,
               'remoteip' => $request->ip(),
           ]
       );

       $data = $response->json();

       if (!($data['success'] && $data['score'] >= 0.5 && $data['action'] === 'submit')) {
           return response()->json(['message' => false], 422);
       }

        $form->name=$request->input("name");
        $form->email=$request->input("email");
        $form->message=$request->input("message");
        $form->date=date('Y-m-d H:i:s');
        $form->save();
        Mail::to('dimjson5430@gmail.com')->send(new Feedback(['name'=>$form->name,'email'=>$form->email,'message'=>$form->message]));
//        $this->sendToTelegram($form->name,$form->email,$form->message);
        return response()->json(["message"=>true]);


    }
    public function all(){
        return response()->json(RequestForm::orderBy("created_at",'desc')->get());
    }
    public function sendToTelegram($name,$email,$text){
        $txt="Имя:$name\nEmail:$email\nСообщение:$text";
        $telegram_api_key = '7460171625:AAFnUXAxYDowDdljYSXVqa6_Ta_DXc4sxOA';
        $chat_id = '-4209554521';
        $telegram_url = "https://api.telegram.org/bot$telegram_api_key/sendMessage?chat_id=$chat_id&text=" . urlencode($txt);
        file_get_contents($telegram_url);
    }


}
