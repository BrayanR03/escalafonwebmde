<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    use HasFactory;
    protected $table='experiencialaboral';
    protected $primaryKey='idExperiencia';
    protected $guarded=[];


    public function institucion(){
        return $this->belongsTo(Institucion::class,'idInstitucion');
    }
    public function cargo(){
        return $this->belongsTo(NivelEstudio::class,'idCargo');
    }
    public function trabajador(){
        return $this->belongsTo(Trabajador::class,'idTrabajador');
    }
}
