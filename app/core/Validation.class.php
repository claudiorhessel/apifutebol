<?php
namespace app\core;

use DateTime;

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
        if (!is_int($value)) {
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
        $validete = mb_strlen($value >= $maxLenght);
        if ($validete) {
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
        $validete = mb_strlen($value <= $minLenght);
        if ($validete) {
            return [
                "field" => $field,
                "value" => $value,
                "message" => "'{$field}' deve ter no mínimo '{$minLenght}' caracteres"
            ];
        }

        return false;
    }
}