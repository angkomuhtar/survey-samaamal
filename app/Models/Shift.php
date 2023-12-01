<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $table = 'shifts';


    public function schedule()
    {
        return $this->belongsTo(WorkSchedule::class, 'wh_code', 'code');
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
    
}
