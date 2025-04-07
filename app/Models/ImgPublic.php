<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImgPublic extends Model
{
    use HasFactory;

    Protected $fillable = [
        'name',
        'path',
        'alt',
    ];
}
