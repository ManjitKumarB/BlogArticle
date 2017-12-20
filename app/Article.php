<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{


    //Mention Massassign attributes
    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];

    //To preserved all attribute property of date data like the Carbon dates
    protected $dates = ['published_at'];


    //Scope attribute to build a query on table to select limited records
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    //Scope attribute to build a query on table to select limited records
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }

    //Scope attribute to build a query on table to select records from specific user
    public function scopeOwnBy($query)
    {
        $query->where('user_id', '=', $user_id);
    }

    //Scope attribute to set date + times to column data
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); //This will set time as it is e.g. 10:10:55

        //OR $this->attribute['published_at'] = Carbon::parse($date)  -  -to set time to mid night e.g. 00:00:00
    }


    /**
     * An article is own by a user.
     *
     * @return Illuminate\Database\Eloquent\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with the given article
     *
     * @return \Illuminate\Database\Eloquent\Relationships\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get the list of tag ids associate with current article.
     * 
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->all('id');
    }

}
