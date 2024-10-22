<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class No_users_restaurants extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'web_site',
    ];
}
