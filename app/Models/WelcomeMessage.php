<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'welcome_sub_title',
        'welcome_title',
        'welcome_message',
        'sign',
        'user_name',
        'user_designation',
        'welcome_image_one',
        'welcome_image_two'
    ];
}
