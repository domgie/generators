<?php

namespace Generator;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use App\Generator\RandomStringGenerator;

class RandomStringGeneratorTest extends TestCase
{
    /**
     * @return iterable<array{int, int}>
     */
    public static function dataProvider(): iterable
    {
        yield '3 lengths' => [3, 3];
        yield '8 lengths' => [8, 8];
        yield '9999 lengths' => [9999, 9999];
        yield 'empty' => [0, 0];
        yield 'negative' => [-5, 0];
    }

    #[DataProvider('dataProvider')]
    public function testGeneration(int $length, int $expects): void
    {
        $generator = new RandomStringGenerator($length);
        $result = $generator->generate();
        $this->assertEquals(strlen($result), $expects);
    }
}
