<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    protected $primaryKey='MovimientoID';
    protected $guarded=[];



    public function trabajador(){
        return $this->belongsTo(Trabajador::class,'idTrabajador');
    }
    public function cargo(){
        return $this->belongsTo(Cargo::class,'idCargo');
    }
    public function area(){
        return $this->belongsTo(Area::class,'idArea');
    }
    public function tipomovimiento(){
        return $this->belongsTo(TipoMovimiento::class,'idTipoMov');
    }
    public function tipodocumento(){
        return $this->belongsTo(TipoDocumento::class,'idTipoDoc');
    }

}
