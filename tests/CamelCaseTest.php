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

    /**
     * @dataProvider snakeCaseProvider
     */
    public function testCamelCase($string, $expected)
    {
        $this->assertEquals($expected, CamelCase::camelCase($string));
    }

    /**
     * @dataProvider snakeCaseProvider
     */
    public function testExplodeCamelCase($string, $expected)
    {
        $this->assertEquals($expected, CamelCase::explodeCamelCase($string));
    }

    /**
     * @dataProvider snakeCaseProvider
     */
    public function testStrtokCamelCase($string, $expected)
    {
        $this->assertEquals($expected, CamelCase::strtokCamelCase($string));
    }
}
