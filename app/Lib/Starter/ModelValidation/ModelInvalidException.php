<?php

namespace Starter\ModelValidation;

class ModelInvalidException extends \RuntimeException
{
    /**
     * The validator used to detect the model invalidity.
     *
     * @var \Illuminate\Contracts\Validation\Validator
     */
    public $validator;

    /**
     * Create a new model invalid exception instance.
     *
     * @param  \Illuminate\Contracts\Validation\validator  $validator
     * @return void
     */
    function __construct($validator)
    {
        $this->validator = $validator;

        $messageArray = [];
        foreach ($validator->failed() as $attribute => $failedRules) {
            $messageArray[] = $attribute . ': ' . join(array_keys($failedRules), ', ');
        }
        $message = join($messageArray, ' - ');

        parent::__construct($message);
    }

    /**
     * Get the message container for the validator of the exception.
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function errors()
    {
        return $this->validator->errors();
    }
}
