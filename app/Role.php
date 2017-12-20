<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * A Role can hold by many users and viceversa
     * 
     * @return \illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
      return $this->belongsToMany(App\User::class);
    }
}
