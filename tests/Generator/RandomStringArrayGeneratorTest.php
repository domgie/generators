<?php

namespace Generator;

use App\Generator\RandomStringGenerator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use App\Generator\RandomStringArrayGenerator;

class RandomStringArrayGeneratorTest extends TestCase
{
    /**
     * @return iterable<array{int, int, int}>
     */
    public static function dataProvider(): iterable
    {
        yield '5 elements' => [5, 5];
        yield '8 elements' => [8, 8];
        yield '9999 elements' => [9999, 9999];
        yield 'empty' => [0, 0];
        yield 'negative' => [-5, 0];
    }

    /**
     * @throws Exception
     */
    #[DataProvider('dataProvider')]
    public function testGeneration(int $size, int $expects): void
    {
        $generator = new RandomStringArrayGenerator(
            $size,
            $this->createMock(RandomStringGenerator::class)
        );
        $result = $generator->generate();
        $this->assertEquals(count($result), $expects);
        $this->assertContainsOnly('string', $result);
    }
}
