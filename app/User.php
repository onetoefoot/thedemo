<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
// use Spatie\BinaryUuid\HasBinaryUuid;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Image\Manipulations;


class User extends Authenticatable implements HasMedia
{
    use Notifiable, UsesTenantConnection, 
        HasRoles, HasMediaTrait;
    
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

    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')
            ->singleFile();
    }
    public function registerMediaConversions($media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50)
            ->sharpen(10);
    }
}
