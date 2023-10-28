<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $table = 'profiles';

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

    public function religions () {
        return $this->belongsTo(Options::class, 'religion', 'id');
    }
    public function marriages () {
        return $this->belongsTo(Options::class, 'marriage', 'id');
    }
    public function educations () {
        return $this->belongsTo(Options::class, 'education', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
