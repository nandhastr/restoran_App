<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id_users'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // untuk membuat nama tabel di database supaya sesuai kriteria
    // protected $table = 'tbl_users';

    // user bisa memiliki banya order
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    // rating hanya bbisa di miliki 1 users
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    // memilah role 
    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
