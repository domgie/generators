<?php

namespace Converter;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use App\Converter\LettersToNumberConverter;

class LettersToNumberConverterTest extends TestCase
{
    // phpcs:ignore
    private LettersToNumberConverter $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new LettersToNumberConverter();
    }

    /**
     * @return iterable<array{string, string}>
     */
    public static function dataProvider(): iterable
    {
        yield 'provided example' => ['22aAcd', '22/1/1/3/4'];
        yield 'only numbers' => ['123456', '123456'];
        yield 'only letters' => ['abcdef', '1/2/3/4/5/6'];
        yield 'empty' => ['', ''];
        yield 'random' => ['123abc', '123/1/2/3'];
    }

    #[DataProvider('dataProvider')]
    public function testConversion(string $string, string $expected): void
    {
        $result = $this->converter->convert($string);
        $this->assertSame($expected, $result);
    }
}
