<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;
    protected $table='trabajadores';
    protected $primaryKey='idTrabajador';
    protected $guarded=[];
    public function condicionLaboral()
    {
        return $this->belongsTo(CondicionLaboral::class, 'idCondicionLaboral');
    }
}
