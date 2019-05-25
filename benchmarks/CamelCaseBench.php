<?php

namespace GasolWu\Benchmark;

class CamelCaseBench
{
    public function provideStrings()
    {
        yield 'underscore' => ['under_score'];
        yield 'dash' => ['da-sh'];
        yield 'nodelimiter' => ['nodelimiter'];
    }

    /**
     * @ParamProviders({"provideStrings"})
     */
    public function benchLaravelCamelCase($string)
    {
        CamelCase::laravelCamelCase($string[0]);
    }

    /**
     * @ParamProviders({"provideStrings"})
     */
    public function benchCamelCase($string)
    {
        CamelCase::camelCase($string[0]);
    }
}
