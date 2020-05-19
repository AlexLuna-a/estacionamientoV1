<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculo';
    
    protected $primaryKey='placa_veh';
    protected $keyType='string';
    public $timestamps = false;
    
    
    
}
