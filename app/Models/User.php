<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'birthday',
        'phone',
        'ip',
        'country'
    ];

    const FIELD_MAP = [
        1 => 'email',
        2 => 'name',
        3 => 'birthday',
        4 => 'phone',
        5 => 'ip',
        6 => 'country'
    ];
}
