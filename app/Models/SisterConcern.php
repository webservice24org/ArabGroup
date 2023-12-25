<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SisterConcern extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'company_title',
        'company_desc',
        'company_icon_one',
        'company_icon_two',
        'company_link'
    ];
}
