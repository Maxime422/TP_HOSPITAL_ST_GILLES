<?php
require_once "validation.php";

function sanitize($string)
{
    if (!is_string($string)) {
        return '';
    }
    $string = htmlspecialchars($string);
    $string = trim($string);
    $string = stripslashes($string);
    return $string;
}

function regexTel($data)
{
    $patternText = '/([0-9]{2}[ |-]?){5}/';
    return preg_match($patternText, $data);
}

function regexAge($data)
{
    $patternText = '/^(\d{4})-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\d|3[0-1])$/';
    return preg_match($patternText, $data);
}

function regexEmail($data)
{
    $patternText = '/(^[a-zA-Z0-9_.]+[@]{1}[a-z0-9]+[\.][a-z]{2,}+$)/m';
    return preg_match($patternText, $data);
}

function regexName($data)
{
    return preg_match('/^[\p{L}]+(?:[-\'\s][\p{L}]+)*$/ui', $data);
}

function regexDate($data)
{
    $patternText = '/^(\d{4})-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\d|3[0-1])$/';
    return preg_match($patternText, $data);
}

function regexID($data)
{
    return preg_match('/^\d+$/', $data);
}
