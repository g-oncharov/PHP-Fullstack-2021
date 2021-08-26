<?php

namespace Framework\Validator;

class Validator
{
    /**
     * Clearing a string from scripts, tags and spaces
     *
     * @param string $value
     * @return string
     */
    public function clean(string $value): string
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        return htmlspecialchars($value);
    }

    /**
     * Checking the length of a string
     *
     * @param string $value
     * @param int $max
     * @param int $min
     * @return bool
     */
    public function checkLength(string $value, int $max = 45, int $min = 2): bool
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }
}
