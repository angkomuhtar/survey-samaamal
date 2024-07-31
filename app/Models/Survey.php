<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'surveys';

    protected $fillable = [
        'event_id',
        'dpt_id',
        'pilihan',
        'paslon_id',
        'ket',
        'kec_verify',
        'kordinator'
    ];
    
    public function dpt(): HasOne
    {
        return $this->hasOne(Pemilih::class, 'id', 'dpt_id');
    }

    public function paslon()
    {
        return $this->hasOne(Paslon::class, 'id', 'paslon_id');
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'id', 'event_id');
    }

}
