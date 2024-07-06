<?php

namespace Converter;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use App\Converter\Rot13Converter;

class Rot13ConverterTest extends TestCase
{
    // phpcs:ignore
    private Rot13Converter $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new Rot13Converter();
    }

    /**
     * @return iterable<array{string, string}>
     */
    public static function dataProvider(): iterable
    {
        yield 'only numbers' => ['123', '123'];
        yield 'only letters' => ['abc', 'nop'];
        yield 'empty' => ['', ''];
        yield 'random' => ['randomstring', 'enaqbzfgevat'];
    }

    #[DataProvider('dataProvider')]
    public function testConvertsRot13(string $string, string $expected): void
    {
        $result = $this->converter->convert($string);
        $this->assertSame($expected, $result);
    }
}
