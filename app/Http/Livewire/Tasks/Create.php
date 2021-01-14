<?php

namespace App\Http\Livewire\Tasks;

use App\Models\FCMToken;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{

public $hora_inicio;
public $fecha;
public $ubicacion;
public $descripcion;
public $adm_id;
public $tec_id;
public $cli_id;
public $hora;
public $minuto;

    protected $rules = [
        'hora' => 'required',
        'minuto' => 'required',
        'fecha' => 'required',
        'ubicacion' => 'required|string',
        'descripcion' => 'required|string',
        'tec_id' => 'required|exists:App\Models\User,id',
        'cli_id' => 'required|exists:App\Models\Cliente,id',
    ];

    public function render()
    {
        return view('livewire.tasks.create');
    }
    public function usr(){
        $this->validate();

        $this->hora_inicio=$this->hora.':'.$this->minuto.':00';
        // Execution doesn't reach here if validation fails.

        Tarea::create([
            'hora_inicio' => $this->hora_inicio,
            'fecha' => $this->fecha,
            'ubicacion' => $this->ubicacion,
            'descripcion' => $this->descripcion,
            'estado' => true,
            'adm_id' => Auth::user()->id,
            'tec_id' => $this->tec_id,
            'cli_id' => $this->cli_id,
        ]);
        $this->prepareNotification($this->tec_id,$this->descripcion);
        $this->redirect('tasks');

    }

    public function prepareNotification($id,$description){
        $to = FCMToken::where('tec_id',$id)->get();
        foreach ($to as $token){
            $to=$token->token;
            $notification = array(
                'title' => "Nueva tarea",
                'body' => $description
            );
            $notification = array('to' => $to, 'notification' => $notification);
            $this->sendNotification($notification);
        }

    }
    public function sendNotification($notification)
    {
//$to = "/topics/tournaments";



        //$this->sendNotif($to, $notification);
        //$feilds = array('registration_ids' => $to, 'notification' => $notification);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notification));

        $headers = array();
        $headers[] = 'Authorization: Key= AAAArftN5sM:APA91bFU6mz0iJLn39SVjtxZEpGwqSE9FjzTB4xKba15I_Ija7YqT1xNTWUauM1zI0xpQfGsnI3hSt-1B8KzDzm5AwRJO_YhH-CogjtT_GDuHUC0KgNmVKXuJ5NnkVeUjjPSJS5Fm1jj';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }
}
