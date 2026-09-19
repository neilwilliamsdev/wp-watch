<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'url',
        'credential_key',
    ];
}
