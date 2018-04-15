<?php

namespace App\Models;

use Despark\Cms\Admin\Traits\RelationshipsTrait;
use Despark\Cms\Models\AdminModel;
use Despark\Cms\Scopes\NotRestricted;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends AdminModel implements UserContract, CanResetPasswordContract, AuthorizableContract
{
    use Authenticatable, Authorizable, CanResetPassword, RelationshipsTrait, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'is_restricted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|max:20',
    ];

    protected $rulesUpdate = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,{id},id',
        'password' => 'max:20',
    ];

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new NotRestricted());
    }
}
