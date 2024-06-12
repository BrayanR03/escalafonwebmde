<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelEstudio extends Model
{
    use HasFactory;
    protected $table='nivelestudios';
    protected $guarded=[];
    protected $primaryKey='idNivelEstudios';
}
