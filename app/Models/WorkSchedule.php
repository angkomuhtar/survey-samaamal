<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkSchedule extends Model
{
    use HasFactory;

    protected $table = 'work_schedule';

    protected $fillable = [
        'code',
        'name'
    ];

    public function shift()
    {
        return $this->hasMany(Shift::class, 'wh_code', 'code');
    }

}
