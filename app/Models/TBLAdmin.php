<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class TBLAdmin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_admin';

    protected $fillable = [
        'admin_id',
        'admin_name',
        'email',
        'password',
        'is_superadmin',
        'sub_admin',
        'is_developer',
        'status',
        'is_active',
        'created_on',
        'school_id',
        'institute_id',
        'username',
        'avatar',
    ];

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

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->admin_id = rand(0000,9999);
        });
    }

}
