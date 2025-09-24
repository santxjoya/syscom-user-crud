<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
     protected $fillable = [
        'use_name',
        'use_mail',
        'rol_id',
        'use_confirmation_date',
        'use_signature',
        'use_contract',
        'use_elimination_date'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
