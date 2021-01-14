<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    public function beginAssistance(Request $request){
        $user=$request->user();
        return Asistencia::create([
            'hora_inicio'=>Carbon::now('America/La_Paz')->toTimeString(),
            'hora_fin'=>null,
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'ubicacion'=>$request['location'],
            'tec_id'=>$user->id,
        ]);
    }
    public function finishAssistance(Request $request){
        $assistance=Asistencia::find($request['assistance_id']);
        $assistance->hora_fin=Carbon::now('America/La_Paz')->toTimeString();
        $assistance->save();
        return $assistance;

    }
    public function assists(Request $request){
        $user=$request->user();
        $assists=Asistencia::where('tec_id',$user->id)->orderBy('created_at','desc')->get();
        return $assists;
    }
}
