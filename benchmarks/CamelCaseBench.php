<?php

namespace GasolWu\Benchmark;

class CamelCaseBench
{
    public function provideStrings()
    {
        yield 'underscore' => ['under_score'];
        yield 'dash' => ['da-sh'];
        yield 'nodelimiter' => ['nodelimiter'];
        yield '2-underscore' => ['two-underscore-sample'];
        yield '3-underscore' => ['three-more-underscore-sample'];
        yield 'very long dash' => ['very-long-dash-sample-foo-bar-baz-hello-world'];
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

    /**
     * @ParamProviders({"provideStrings"})
     */
    public function benchExplodeCamelCase($string)
    {
        CamelCase::explodeCamelCase($string[0]);
    }

    /**
     * @ParamProviders({"provideStrings"})
     */
    public function benchStrtokCamelCase($string)
    {
        CamelCase::strtokCamelCase($string[0]);
    }
}
