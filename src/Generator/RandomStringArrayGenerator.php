<?php

namespace App\Generator;

readonly class RandomStringArrayGenerator implements GeneratorInterface
{
    /**
     * @param int $size
     * @param RandomStringGenerator $generator
     */
    public function __construct(
        private int $size,
        private RandomStringGenerator $generator
    ) {
    }

    /**
     * @return array|string[]
     */
    public function generate(): array
    {
        if ($this->size <= 0) {
            return [];
        }

        return array_map(
            fn($i) => $this->generator->generate(), range(1, $this->size)
        );
    }
}
