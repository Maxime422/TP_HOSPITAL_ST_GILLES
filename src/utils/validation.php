<?php
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

function regexEmail($data)
{
  $patternText = '/(^[a-zA-Z0-9_.]+[@]{1}[a-z0-9]+[\.][a-z]{2,}+$)/m';
  return preg_match($patternText, $data);
}

function regexTxt($data)
{
  return preg_match('/^[\p{L}]+(?:[-\'\s][\p{L}]+)*$/ui', $data);
}

function regexDate($data)
{
  $patternText = '/^(000[1-9]|00[1-9]\d|0[1-9]\d\d|100\d|10[1-9]\d|1[1-9]\d{2}|[2-9]\d{3}|[1-9]\d{4}|1\d{5}|2[0-6]\d{4}|27[0-4]\d{3}|275[0-6]\d{2}|2757[0-5]\d|275760)-(0[1-9]|1[012])-(0[1-9]|[12]\d|3[01])$/';


  return preg_match($patternText, $data);
}

function regexID($data)
{
  return preg_match('/^\d+$/', $data);
}
