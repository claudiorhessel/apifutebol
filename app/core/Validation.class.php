<?php
namespace app\core;

use DateTime;
use Helper;

class Validation
{
    public function required($field, $value)
    {
        if (empty($value) || $value == null || $value == "") {
            return [
                "field" => $field,
                "value" => $value,
                "message" => "'{$field}' deve ser informado"
            ];
        }

        return false;
    }

    public function int($field, $value)
    {
        return $this->integer($field, $value);
    }

    public function integer($field, $value)
    {
        if (!is_int(intval($value))) {
            return [
                "field" => $field,
                "value" => $value,
                "message" => "'{$field}' deve ser do tipo 'inteiro'"
            ];
        }

        return false;
    }

    public function date($field, $value, $format = 'Y-m-d')
    {
        $dateTime = DateTime::createFromFormat($format, $value);
        $validatedDate = $dateTime && $dateTime->format($format) == $field;

        if (!$validatedDate) {
            return [
                "field" => $field,
                "value" => $value,
                "message" => "'{$field}' deve ser uma data no formato '{$format}'"
            ];
        }

        return false;
    }

    public function dateTime($field, $value, $format = 'Y-m-d H:i:s')
    {
        $dateTime = DateTime::createFromFormat($format, $value);
        $validatedDate = $dateTime && $dateTime->format($format) == $field;

        if (!$validatedDate) {
            return [
                "field" => $field,
                "value" => $value,
                "message" => "'{$field}' deve ser uma data no formato '{$format}'"
            ];
        }

        return false;
    }


    public function bool($field, $value)
    {
        if (empty($value) || $value == null || $value == "") {
            return [
                "field" => $field,
                "value" => $value,
                "message" => "'{$field}' deve ser informado"
            ];
        }

        return false;
    }


    public function max($field, $value, $maxLenght = 255)
    {
        $validate = mb_strlen($value) >= $maxLenght;

        if ($validate) {
            return [
                "field" => $field,
                "value" => $value,
                "message" => "'{$field}' deve ter no máximo '{$maxLenght}' caracteres"
            ];
        }

        return false;
    }

    public function min($field, $value, $minLenght = 3)
    {
        $validate = mb_strlen($value) <= $minLenght;

        if ($validate) {
            return [
                "field" => $field,
                "value" => $value,
                "message" => "'{$field}' deve ter no mínimo '{$minLenght}' caracteres"
            ];
        }

        return false;
    }

    public function size($field, $value, $minLenght = 4)
    {
        $validate = mb_strlen($value) != $minLenght;

        if ($validate) {
            return [
                "field" => $field,
                "value" => $value,
                "message" => "'{$field}' deve ter '{$minLenght}' caracteres"
            ];
        }

        return false;
    }
}