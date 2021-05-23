<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repairs extends Model
{
    use HasFactory;

    protected $table ='reparacion_equipos';
    protected $hidden = ['created_at', 'updated_at'];
}
