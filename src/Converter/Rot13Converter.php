<?php

namespace App\Converter;

readonly class Rot13Converter implements ConverterInterface
{
    /**
     * @param  string $input
     * @return string
     */
    public function convert(string $input): string
    {
        return str_rot13($input);
    }
}
