<?php

namespace GasolWu\Benchmark;

class CamelCase
{
    public static function laravelCamelCase($string)
    {
        $lower_string = strtolower($string);
        $replaced = str_replace(['-', '_'], ' ', $lower_string);
        $uc_string = ucwords($replaced);
        return lcfirst(
            str_replace(' ', '', $uc_string)
        );
    }
}
