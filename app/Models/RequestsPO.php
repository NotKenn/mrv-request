<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsPO extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer',
        'item',
        'level',
        'status',
        'created_at',
        'updated_at',
    ];  
    
    public function user()
    {
        return $this->belongsTo('App\Models\UserList', 'id');
    }
}
