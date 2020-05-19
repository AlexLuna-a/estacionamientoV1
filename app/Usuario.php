<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //public $timestamps = false;
    protected $table = 'usuario';
    protected $keyType = 'string';
    
    
    
    
    public function tipo(){
        return $this->belongsTo('App\TipoUsuario', 'clave_tipo');
    }
}
