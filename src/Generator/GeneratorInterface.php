<?php

namespace App\Generator;

interface GeneratorInterface
{
    /**
     * @return array<string>|string
     */
    public function generate(): string|array;
}
