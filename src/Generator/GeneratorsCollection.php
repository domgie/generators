<?php

namespace App\Generator;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

/**
 * @implements IteratorAggregate<GeneratorInterface>
 */
class GeneratorsCollection implements IteratorAggregate
{
    /**
     * @var GeneratorInterface[]
     */
    // phpcs:ignore
    private array $generators = [];

    /**
     * @param  GeneratorInterface $generator
     * @return void
     */
    public function add(GeneratorInterface $generator): void
    {
        $this->generators[] = $generator;
    }

    /**
     * @return Traversable<GeneratorInterface>
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->generators);
    }
}
