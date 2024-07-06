<?php

namespace Generator;

use App\Generator\RandomStringArrayGenerator;
use App\Generator\RandomStringGenerator;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use App\Generator\GeneratorsCollection;

class GeneratorsCollectionTest extends TestCase
{
    // phpcs:ignore
    private GeneratorsCollection $collection;

    protected function setUp(): void
    {
        parent::setUp();
        $this->collection = new GeneratorsCollection();
    }

    /**
     * @throws Exception
     */
    public function testCollection(): void
    {
        $mockGenerator1 = $this->createMock(RandomStringGenerator::class);
        $this->collection->add($mockGenerator1);
        $this->assertCount(1, $this->collection);

        $mockGenerator2 = $this->createMock(RandomStringArrayGenerator::class);
        $this->collection->add($mockGenerator2);
        $this->assertCount(2, $this->collection);

        $this->assertInstanceOf(
            \Traversable::class, $this->collection->getIterator()
        );

        $this->assertContains($mockGenerator1, $this->collection);
        $this->assertContains($mockGenerator2, $this->collection);
    }
}
