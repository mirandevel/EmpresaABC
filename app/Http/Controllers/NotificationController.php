<?php

namespace App\Http\Controllers;

use App\Models\FCMToken;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function registerTokenFCM(Request $request){
        $user=$request->user();
        $fcmToken=new FCMToken();
        $fcmToken->token=$request['token'];
        $fcmToken->tec_id=$user->id;
        $fcmToken->timestamps=false;
        $fcmToken->save();
        return $fcmToken;
    }
}
