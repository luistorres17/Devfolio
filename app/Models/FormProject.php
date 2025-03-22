<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormProject extends Model
{
    use HasFactory;

    Protected $fillable = [
        'nameProject',
        'descripcion',
        'link_url',
        'image',
        'fecha_realizacion',
    ];
}
