<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    //Mention Massassign attributes
    protected $fillable = [
        'name'
    ];

    /** 
     * Get the articles associated with the given tag.
     * 
     * @return \Illuminate\Database\Eloquent\Relationship\BelongsToMany
     * 
    */
    public function articles()
    {

        return $this->belongsToMany('App\Article');

    }
}
