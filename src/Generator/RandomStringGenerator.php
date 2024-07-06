<?php

namespace App\Generator;

readonly class RandomStringGenerator implements GeneratorInterface
{
    /**
     * @param int $length
     */
    public function __construct(
        private int $length
    ) {
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        if ($this->length <= 0) {
            return '';
        }

        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return substr(
            str_shuffle(str_repeat($chars, $this->length)), 0, $this->length
        );
    }
}
