<?php

namespace Starter\ModelValidation;

use Validator;

trait ModelValidator
{
    /**
     * The validation rules used to validate the model.
     *
     * @var array
     */
    protected $validationRules = [];

    /**
     * Throw an exception is the model is not valid.
     *
     * @return void
     */
    public function validate()
    {
        if (! $this->isValid()) {
            throw new ModelInvalidException($this->validator());
        }
    }

    /**
     * Check if the model is valid.
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->validator()->passes();
    }


    /**
     * Returns the validator for the model. Data comes from the model attributes 
     * and rules from the $validationRules attribute
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator()
    {
        $validator = Validator::make($this->getAttributes(), $this->processRules($this->validationRules));
        $validator->passes();

        return $validator;
    }

    /**
     * Replace :self: in the rules by the id of the object. Used to validate the 
     * unicity of a field when we edit it.
     *
     * Example : ['email' => 'unique:users,email,:self:'] 
     *
     * @param  array  $rules
     * @return array
     */
    protected function processRules(array $rules)
    {
        array_walk($rules, function(&$rule)
        {
            $rule = str_ireplace(':self:', $this->getKey(), $rule);
        });

        return $rules;
    }
}
