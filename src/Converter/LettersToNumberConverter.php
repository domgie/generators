<?php

namespace App\Converter;

readonly class LettersToNumberConverter
{
    /**
     * @param  string $input
     * @return string
     */
    public function convert(string $input): string
    {
        $str = '';
        foreach (str_split($input) as $char) {
            $str .= is_numeric($char) ? $char : '/' . (ord(strtolower($char)) - 96);
        }
        return ltrim($str, '/');
    }
}
