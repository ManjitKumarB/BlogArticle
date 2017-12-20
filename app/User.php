<?php

namespace App;

use App\Role;
use Illuminate\Notifications\Notifiable;
//use illuminate\Database\Eloquent\Relations\HasMany;
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


    /**
     * A user can have many articles
     *
     * @return \illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Article');

    }

    /**
     * A user can have many roles and viceversa
     * 
     * @return \illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }

    /**
     * A user must be authorize before accessing to the app
     * @return boolean
     * 
     */
    public function authorizeRoles($roles)
    {
      if ($this->hasAnyRole($roles)) {
        return true;
      }
      abort(401, 'This action is unauthorized.');
    }
    
    /**
     * Verify any role assigned to user
     * 
     * @return boolean
     * 
     */
    public function hasAnyRole($roles)
    {
      if (is_array($roles)) {
        foreach ($roles as $role) {
          if ($this->hasRole($role)) {
            return true;
          }
        }
      } else {
        if ($this->hasRole($roles)) {
          return true;
        }
      }
      return false;
    }
    
    /**
     * There any role assigned to User 
     * 
     * @return boolean
     * 
     */
    public function hasRole($role)
    {
      if ($this->roles()->where('name', $role)->first()) {
        return true;
      }
      return false;
    }
}
