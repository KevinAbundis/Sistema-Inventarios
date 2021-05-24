<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenances extends Model
{
    use HasFactory;

    protected $table ='mantenimiento_equipos';
    protected $hidden = ['created_at', 'updated_at'];
}
