<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'rol_id';
    use HasFactory;
    protected $fillable = ['rol_name'];

    public function usuarios()
    {
        return $this->hasMany(User::class, 'rol_id');
    }
}
