<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    use HasFactory;
    protected $tables='estudios';
    protected $primaryKey='idEstudios';
    protected $guarded=[];


    public function institucion(){
        return $this->belongsTo(Institucion::class,'idInstitucion');
    }
    public function nivelestudios(){
        return $this->belongsTo(NivelEstudio::class,'idNivelEstudios');
    }
    public function trabajador(){
        return $this->belongsTo(Trabajador::class,'idTrabajador');
    }
}
