<?php


class UserValidation
{
    public function getEmptyValidations()
    {
        return array(
            'username' => "",
            'firstName' => "",
            'lastName' => "",
            'password' => "",
            'login' => "",
            'email' => "",
        );
    }

    public function validate($object, $files) {
        return array(
            'username' => "",
            'firstName' => "",
            'lastName' => "",
            'password' => "",
            'login' => "",
            'email' => "",
        );
    }
}