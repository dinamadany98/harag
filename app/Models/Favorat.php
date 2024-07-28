<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorat extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'saller_id',
        'announcement_id',
        
    ];
}
