<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroHome extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'welcome_text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Método para acceder directamente al name del usuario
    public function getUserNameAttribute()
    {
        return $this->user ? $this->user->name : 'Sin usuario';
    }

    
}
