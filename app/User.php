<?php

namespace Furbook;

use Cat;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //ep kieu int thanh boolean
    protected $casts = [
        'is_admin'=> 'boolean',
    ];

    public function cats()
    {
        return $this->hasMany('Furbook\Cat');
    }
    public function owns(Cat $cat)
    {
        return $this->id == $car->user_id;
    }
    public function canEdit()
    {
        return $this->is_admin || return $this->owns($cat);
    }
    public function isAdministrator()
    {
        return $this->
    }
}
