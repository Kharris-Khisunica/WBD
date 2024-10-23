<?php

namespace app\core;
use app\exceptions\BadRequestException;
use app\exceptions\BaseException;

class Service
{
    protected function validateNotEmpty($value, $fields) 
    {
        $errors = [];
        foreach ($fields as $field) {
            if (!isset($value[$field]) || $value[$field] === "") {
                $errors[$field] = ucfirst(strtolower($field)) . " can not be empty!";
            }   
        }
        return $errors;
    }

    protected function validation($errors)
    {
        if (!empty($errors)) {
            throw new BadRequestException(false, $errors);
        }
    }
} 