<?php

namespace GasolWu\Benchmark;

class CamelCase
{
    public static function camelCase($string)
    {
        $result = '';
        $upper_next = false;

        $length = strlen($string);
        for ($i = 0; $i < $length; $i++) {
            $c = $string[$i];
            $byte = ord($c);

            if ($byte == 45 || $byte == 95) { // delimiter
                $c = '';
                $upper_next = true;
            } elseif ($byte > 64 && $byte < 91) { // upper
                if ($upper_next) {
                    $upper_next = false;
                } else {
                    $c = chr($byte + 32); // tolower
                }
            } elseif ($byte > 96 && $byte < 123) { // lower
                if ($upper_next) {
                    $c = chr($byte + -32); // toupper
                    $upper_next = false;
                }
            } else {
                $upper_next = false;
            }

            $result .= $c;
        }
        return $result;
    }

    public static function explodeCamelCase($string)
    {
        $string = strtolower($string);
        $string = str_replace('-', '_', $string);
        $result = '';
        foreach (explode('_', $string) as $i => $segment) {
            $result .= ($i > 0) ? ucfirst($segment) : $segment;
        }
        return $result;
    }

    public static function laravelCamelCase($string)
    {
        $lower_string = strtolower($string);
        $replaced = str_replace(['-', '_'], ' ', $lower_string);
        $uc_string = ucwords($replaced);
        return lcfirst(
            str_replace(' ', '', $uc_string)
        );
    }

    public static function strtokCamelCase($string)
    {
        $delimiter = '-_';
        $string = strtolower($string);
        $token = strtok($string, $delimiter);
        $result = '';
        while ($token !== false) {
            $result .= ucfirst($token);
            $token = strtok($delimiter);
        }
        return lcfirst($result);
    }
}
