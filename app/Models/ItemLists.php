<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLists extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'itemName',
    ];  

    public $timestamps = false;
    
}
