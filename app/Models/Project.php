<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $table = 'projects';

    protected $fillable = [
        'name', 
        'card_id', 
        'kk', 
        'education', 
        'tmp_lahir', 
        'tgl_lahir',
        'gender',
        'religion',
        'marriage',
        'id_addr',
        'live_addr',
        'phone',
        'user_id'
    ];
}
