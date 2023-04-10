<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovingAssigning extends Model
{
    use HasFactory;

    protected $fillable = [
        'approved_date',
        'user_id',
        'req_id',
        'isApproved',
        'level'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\UserList', 'id');
    }
}
