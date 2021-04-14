<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPUFeatures extends Model
{
    use HasFactory;

    protected $table ='caracteristicas_cpu';
    protected $hidden = ['created_at', 'updated_at'];
}
