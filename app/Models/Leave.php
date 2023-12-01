<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = 'leaves';

    protected $fillable = [
        'user_id',
        's_date',
        'e_date',
        'leave_type_id',
        'tot_day',
        'attachment',
        'approver_note',
        'caretaker_id',
        'note',
        'approver_id',
        'status'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function approver()
    {
        return $this->hasOne(User::class, 'id', 'approver_id');
    }

    public function caretaker()
    {
        return $this->hasOne(User::class, 'id', 'caretaker_id');
    }

    public function leave_type()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id', 'id');
    }

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->created_at = now();
        });
    }
}
