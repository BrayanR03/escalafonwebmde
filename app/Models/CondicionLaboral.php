<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondicionLaboral extends Model
{
    use HasFactory;
    protected $primaryKey='idCondicionLaboral';
    protected $guarded=[];
    protected $table='condicionlaboral';
}
