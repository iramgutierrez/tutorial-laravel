<?php

namespace App\Gigigo\Entities;

use Illuminate\Database\Eloquent\Model;

class TeamEntity extends Model
{
    protected $table = 'teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $appends = [];

    public function members()
    {
        return $this->hasMany(MemberEntity::class , 'team_id');
    }

}
