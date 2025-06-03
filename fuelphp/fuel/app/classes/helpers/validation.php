<?php

use Fuel\Core\Validation;

class Helpers_Validation
{
    /**
     * Collect multiple validation errors per field from a Validation instance.
     *
     * @param \Validation $validation
     * @return array
     */
    public static function getErrors(Validation $validation)
    {
        $errors = [];

        foreach ($validation->error() as $field => $error_obj) {
            $errors[$field][] = $error_obj->get_message();
        }

        return $errors;
    }
}
