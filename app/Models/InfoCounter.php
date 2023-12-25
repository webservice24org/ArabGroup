<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCounter extends Model
{
    use HasFactory;
    protected $fillable = [
        'counter',
        'counter_sub_title',
        'counter_title'
    ];
}
