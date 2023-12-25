<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcernHeader extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_header',
        'sec_header',
        'sec_icon'
    ];
}
