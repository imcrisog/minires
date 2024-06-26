<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'banner',
        'slug',
        'price',
        'likes',
        'views'
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo('App\Models\Profile');
    }

    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Profile');
    }

    public function tags() 
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeProfileNStudents($query)
    {
        return $query->with('profile')->with('profiles');
    }
}
