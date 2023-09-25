<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Options extends Model
{
    use HasFactory;
    
    protected $table = 'options';

    protected $fillable = [
        'type',
        'kode',
        'value',
        'urut',
    ];

    

    

}
