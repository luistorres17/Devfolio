<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactPrivate extends Model
{
    use HasFactory;
    protected $fillable = [
        'submission_id',
        'reviewed_by',
        'notes',
        'created_at',
    ];
}
