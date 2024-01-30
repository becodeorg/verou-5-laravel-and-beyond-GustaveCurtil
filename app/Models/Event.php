<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = ['date', 'time', 'title', 'description', 'user_id'];
    
    use HasFactory;
}
