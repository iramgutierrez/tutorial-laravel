<?php

namespace App\Gigigo\Validators;

use App\Gigigo\Entities\TeamEntity as Entity;
use Illuminate\Support\Facades\Validator;

class TeamValidator {

    /**
     * @array rules
     */
    protected $rules = [
        'name' => 'required|unique:teams,name'
    ];

    /**
     * @object Entity
     */
    protected $entity;

    /**
     * @object
     */
    protected $errors;

    /**
     * @param Entity $Entity
     */
    public function __construct(Entity $Entity)
    {
        $this->entity = $Entity;
    }
    /**
     * @return mixed
     */
    public function getRules()
    {
        return $this->rules;
    }
    /**
     * @return mixed
     */
    public function getCreateRules()
    {
        return $this->getRules();
    }
    /**
     * @return mixed
     */
    public function getUpdateRules()
    {
        $rules = $this->getRules();

        $rules['name'] .= ','.$this->entity->id;

        return $rules;
    }
    /**
     * @return mixed
     */
    public function getErrors()
    {

        return $this->errors;
    }
    /**
     * @param $data
     * @return bool
     */
    public function isValid($data)
    {
        $this->data = $data;

        if ($this->entity->exists) {
            $rules = $this->getUpdateRules();
        } else {
            $rules = $this->getCreateRules();
        }

        $validation =  Validator::make($data, $rules);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }
    /**
     * @param Entity $Entity
     */
    public function setEntity(Entity $Entity)
    {
        $this->entity = $Entity;
    }

}