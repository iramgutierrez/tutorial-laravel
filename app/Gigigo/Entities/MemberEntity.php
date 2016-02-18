<?php

namespace App\Gigigo\Entities;

use Illuminate\Database\Eloquent\Model;

class MemberEntity extends Model
{
    protected $table = 'members';
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
        return $this->belongsTo(TeamEntity::class , 'team_id');
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
