<?php

namespace App\Converter;

interface ConverterInterface
{
    /**
     * @param  string $input
     * @return string
     */
    public function convert(string $input): string;
}
