<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
// use Spatie\BinaryUuid\HasBinaryUuid;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class User extends Authenticatable
{
    use Notifiable, UsesTenantConnection, HasRoles;
    
    // use HasBinaryUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name', 'email', 'password',
        // 'uuid',
        // 'name',
        // 'first_name',
        // 'last_name',
        // 'email',
        // 'avatar_type',
        // 'avatar_location',
        // 'password',
        // 'password_changed_at',
        // 'active',
        // 'confirmation_code',
        // 'confirmed',
        // 'timezone',
        // 'last_login_at',
        // 'last_login_ip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'active'
    ];

    /**
     * the attributes that should be guarded from Mass Assignment
     *
     * @var array
     */
    protected $guarded = [
        'created_at', 'updated_at', 'password_hash'
    ];

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }
}
