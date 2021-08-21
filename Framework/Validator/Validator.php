<?php

namespace Framework\Validator;

class Validator
{
    public function clean($value): string
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        return htmlspecialchars($value);
    }

    public function checkLength($value, $max = 45, $min = 2): bool
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }
}
