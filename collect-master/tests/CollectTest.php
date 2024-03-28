<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase
{
    public function testCountSame()
    {
        $collect = new Collect\Collect([13,17]);
        $this->assertSame(2, $collect->count());
    }

    public function testCountNotSame()
    {
        $collect = new Collect\Collect([13,17]);
        $this->assertNotSame(5, $collect->count());
    }

    public function testKeysSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertSame(['x', 'y'], $collect->keys()->toArray());
    }

    public function testKeysNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertNotSame(['x', 'z'], $collect->keys()->toArray());
    }

    public function testValuesSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertSame([1, 2], $collect->values()->toArray());
    }

    public function testValuesNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertNotSame([2, 3], $collect->values()->toArray());
    }

    public function testGetWithKey()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertSame(1, $collect->get('x'));
    }

    public function testGetWithoutKey()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertSame(['x' => 1, 'y' => 2], $collect->get());
    }

    public function testExceptWithArray()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(['x' => 1, 'z' => 3], $collect->except(['y'])->toArray());
    }

    public function testExceptWithMultipleArguments()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(['x' => 1], $collect->except('y', 'z')->toArray());
    }

    public function testOnlyWithMultipleArguments()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(['x' => 1, 'z' => 3], $collect->only('x', 'z')->toArray());
    }

    public function testFirst()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(1, $collect->first());
    }

    public function testToArray()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(['x' => 1, 'y' => 2, 'z' => 3], $collect->toArray());
    }

    public function testSearch()
    {
        $collect = new Collect\Collect([
            ['id' => 1, 'fruit' => 'apple'],
            ['id' => 2, 'fruit' => 'banana'],
        ]);
        $result = $collect->search('fruit', 'apple')->toArray();
        $this->assertSame(['id' => 1, 'fruit' => 'apple'], $result);
    }

    public function testMap()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $result = $collect->map(function ($item) {
            return $item * 2;
        })->toArray();
        $this->assertSame([2, 4, 6], $result);
    }

    public function testUnshift()
    {
        $collect = new Collect\Collect([2, 3, 4]);
        $collect->unshift(1);

        $this->assertSame([1, 2, 3, 4], $collect->toArray());
    }
}