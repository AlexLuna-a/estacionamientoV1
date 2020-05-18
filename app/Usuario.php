<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model {

    protected $fillable= [
        'id', 'apellido_p_user', 'apellido_m_user', 'nombre_user','fecha_ingreso_user' ,'vigencia_user', 'clave_tipo'
    ];
    protected $hidden =['password_user'];
    protected $table;
    function __construct() {
        $this->table = 'usuario';
    }

    public function findUsuario($codigo) {
        $tabla = $this->getTable();

        $usuario = DB::table($tabla)->where('id', '=', $codigo)->first();

        return $usuario;
    }
    
    
    public function acttualizar(){
        $tabla = $this->getTable();
        
        $usuario= DB::table($tabla)->where('id','=', $this->id)
                ->update( array(
                    'apellido_p_user' => $this->apellido_p_user, 
                    'apellido_m_user' => $this->apellido_m_user,
                    'nombre_user' => $this->nombre_user, 
                    'vigencia_user'=> $this->vigencia_user, 
                    'clave_tipo' => $this->clave_tipo,
                    'fecha_ingreso_user' => $this->fecha_ingreso_user
                    
                ));
                
    }
    

    
    public function tipo(){
        return $this->belongsTo('\App\tipoUsuario','clave_tipo');
        
    }
    
    

}
