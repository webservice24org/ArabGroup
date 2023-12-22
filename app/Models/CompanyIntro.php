<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyIntro extends Model
{
    use HasFactory;
    protected $fillable =[
        'widget_title',
        'about_title',
        'about_desc',
        'about_img'
    ];
}
