<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactPublic extends Model
{
    use HasFactory;

    //name, mensaje, email, phone
    protected $fillable = [
        'name',
        'mensaje',
        'email',
        'phone',
    ];
}
