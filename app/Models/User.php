<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'use_id';
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
        return $this->belongsTo(Rol::class, 'rol_id', 'rol_id');
    }
    public function getDiasTrabajadosAttribute() {
        $fechaInicio = $this->use_confirmation_date;
        $fechaInicio = Carbon::parse($fechaInicio);
        $hoy = Carbon::today();

        if ($fechaInicio->greaterThan($hoy)) return 0;

        $diasHabiles = 0;
        for ($date = $fechaInicio->copy(); $date->lessThanOrEqualTo($hoy); $date->addDay()) {
            if (!$date->isWeekend()) $diasHabiles++;
        }

        $year = $fechaInicio->year;
        $response = Http::get("https://api-colombia.com/api/v1/holiday/year/$year");

        if ($response->ok()) {
            $holidays = $response->json();
            foreach ($holidays as $holiday) {
                $holidayDate = Carbon::parse($holiday['date']);
                if ($holidayDate->between($fechaInicio, $hoy) && !$holidayDate->isWeekend()) {
                    $diasHabiles--;
                }
            }
        }

        return $diasHabiles;
    }
}
