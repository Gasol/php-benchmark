<?php

namespace GasolWu\Benchmark;

use PHPUnit\Framework\TestCase;

class CamelCaseTest extends TestCase
{
    public function snakeCaseProvider()
    {
        return [
            'dash' => ['snake-case', 'snakeCase'],
            'underscore' => ['under_score', 'underScore'],
            'uppercase' => ['UPPERCASE', 'uppercase'],
        ];
    }

    /**
     * @dataProvider snakeCaseProvider
     */
    public function testLaravelCamelCase($string, $expected)
    {
        $this->assertEquals($expected, CamelCase::laravelCamelCase($string));
    }
}
