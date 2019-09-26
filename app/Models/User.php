<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    public static $ROLES = [
        'admin',
        'customer',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public static function current()
    {
        return Auth::check() ? Auth::user()->getKey() : session()->getId();
    }

    /**
     * @param $needle
     * @return bool
     */
    public function hasRole($needle): bool
    {
        if (is_array($needle)) {
            return in_array($this->role, $needle);
        }

        return $this->role === $needle;
    }
}
