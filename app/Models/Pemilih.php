<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemilih extends Model
{
    use HasFactory;

    protected $table = 'dpts';

    public function kelurahan(): HasOne
    {
        return $this->hasOne(Desa::class, 'id', 'desa');
    }

    public function kecamatan(): HasOne
    {
        return $this->hasOne(Kecamatan::class, 'id', 'kec');
    }

    public function survey()
    {
        return $this->hasMany(Survey::class, 'dpt_id', 'id');
    }

}
