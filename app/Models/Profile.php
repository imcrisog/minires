<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
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
        'icon',
        'banner',
        'bio',
        'type',
        'premium'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function teach_courses()
    {
        return $this->hasMany('App\Models\Course');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course');
    }

    public function badges()
    {
        return $this->belongsToMany('App\Models\Badge');
    }
}
