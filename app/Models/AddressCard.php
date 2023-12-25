<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'widget_title',
        'office_phone',
        'email',
        'address'
    ];
}
