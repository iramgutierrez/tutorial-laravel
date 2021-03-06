<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email' , 'team_id' , 'image'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $appends = ['full_image'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function getFullImageAttribute()
    {
        if(empty($this->image))
        {
            return '';
        }

        return asset('members/'.$this->image);
    }
}
