<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outputs extends Model
{
    use HasFactory;

     protected $table ='salidas_equipos';
    protected $hidden = ['created_at', 'updated_at'];
}
