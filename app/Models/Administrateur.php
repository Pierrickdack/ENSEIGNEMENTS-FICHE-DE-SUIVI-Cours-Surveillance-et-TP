<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    protected $table = 'chefs';

    protected $fillable = [
        'nomCD',
        'emailCD',
    ];

    protected $hidden = [
        'mdpCD',
    ];
}
