<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormAbout extends Model
{
    use HasFactory;

    Protected $fillable = [
        'name',
        'email',
        'phone',
        'descripcion',
        'experiencia',
        'github',
        'linkedin',
    ];
}
