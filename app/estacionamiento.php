<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

class Estacionamiento extends Model
{
     protected $table = 'estacionamiento';
     
     public function getDisponibles($nivel = 3) {
         $estacionamientos = DB::table($this->table)
                 ->where('nivel_est','<=',$nivel)
                 ->get();
         return $estacionamientos;
     }
     
     public function duplicados($nom, $ubi){
         $estacionamiento = DB::table($this->table)
                 ->where('nombre_est','=',$nom)
                 ->orWhere('ubicacion_est','=',$ubi)
                 ->first();
         return $estacionamiento->id;
     }
     
     
     
     
     
     
     
}
