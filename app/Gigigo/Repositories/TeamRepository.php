<?php

namespace App\Gigigo\Repositories;

use App\Gigigo\Entities\TeamEntity as Entity;

class TeamRepository {

    protected $entity;

    public function __construct(Entity $Entity)
    {
        $this->entity = $Entity;
    }

    public function all()
    {
        return $this->entity->get();
    }

    public function findById($id)
    {
        return $this->entity->with('members')->find($id);
    }

}