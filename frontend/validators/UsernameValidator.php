<?php

namespace frontend\validators;

use yii\validators\Validator;

class UsernameValidator extends Validator
{
    public function init()
    {
        parent::init();
        $this->message = "Username shouldn't contain word 'admin'.";
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;

        if (stripos($value, 'admin')) {
            $model->addError($attribute, $this->message);
        }
    }

    public function clientValidateAttribute($model, $attribute, $view): string
    {
        $message = json_encode($this->message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return <<<JS
if (value.toLowerCase().indexOf('admin') !== -1) {
    messages.push($message)
}
JS;
    }
}
