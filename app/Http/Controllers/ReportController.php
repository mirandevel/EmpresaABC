<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;


class ReportController extends Controller
{
    public function download(){
        /*$no_of_hours = Asistencia::where('tec_id','=', 2)
            ->join('users', 'asistencias.tec_id', '=', 'users.id')
            ->selectRaw('time(sum(TIMEDIFF( hora_inicio, hora_fin))) as total')
            ->get();
        return $no_of_hours;
        $no_of_hours->toArray();
        foreach ($no_of_hours as $hour){
            return $hour;
        }*/
     //   }
        //return $s;
       // return $no_of_hours;
       // $data=BD::select
/*       $data= DB::table('asistencias')
            ->select('asistencias.id',DB::raw('SUM(id) AS sum_of_1'))
           ->groupBy('asistencias.id')
            ->get();
       return $data;*/

       /* $users=User::select('users.*')
            ->join('asistencias', 'users.id', '=', 'asistencias.tec_id')
            ->sum('TIMEDIFF( hora_inicio, hora_fin)')
            ->get();*/
        //return $users;
        $data=DB::select('select users.id,users.name,users.ci,
  time(SUM(TIMEDIFF(hora_fin,hora_inicio))) as trabajada
from users,asistencias
where users.id=asistencias.tec_id
GROUP BY users.id,users.name,users.ci');
        return $data;
        $pdf=PDF::loadView('all-users',compact('users'));
        return $pdf->download('users.pdf');
    }
}
