<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\TareaAsistida;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function allTask(Request $request){
        return Tarea::orderBy('created_at','desc')->get();
    }
    function tasksByUser(Request $request){
        $user=$request->user();
        $tareas=Tarea::where('tec_id',$user->id)->orderBy('created_at','desc')->get();
        foreach ($tareas as &$tarea){
            $tarea->load('technical');
            $tarea->load('administrator');
            $tarea->load('client');
            $tarea->load('task_assitance');
        }

        return $tareas;

    }
    function beginTask(Request $request){
        $user=$request->user();
        $begin=TareaAsistida::create([
            'hora_llegada'=>Carbon::now('America/La_Paz')->toTimeString(),
            'hora_terminada'=>null,
            'ubicacion'=>$request['location'],
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'tec_id'=>$user->id,
            'tarea_id'=>$request['tarea_id']
        ]);
        return $begin;
    }
    function finishTask(Request $request){
        $user=$request->user();
        $task=Tarea::find($request['tarea_id']);
        $finishTask=TareaAsistida::where('tec_id',$user->id)->where('tarea_id',$task->id)->first();

        $task->estado=0;
        $task->save();

        $finishTask->hora_terminada=Carbon::now('America/La_Paz')->toTimeString();
        $finishTask->save();

        $task->load('technical');
        $task->load('administrator');
        $task->load('client');
        $task->load('task_assitance');

        return $task;
    }



}
