<?php

use PHPUnit\Framework\TestCase;
use Wowpack\Enumeration\Enumerable;

class MyEnum implements Enumerable
{
    // Implement the required methods for testing...
}

class EnumerableTest extends TestCase
{
    public function testAll()
    {
        $this->assertIsArray(MyEnum::all());
    }

    public function testKeys()
    {
        $this->assertIsArray(MyEnum::keys());
    }

    public function testValues()
    {
        $this->assertIsArray(MyEnum::values());
    }

    public function testAssoc()
    {
        $this->assertIsArray(MyEnum::assoc());
    }

    public function testGet()
    {
        $this->assertNotNull(MyEnum::get('some_key'));
    }

    public function testHas()
    {
        $this->assertTrue(MyEnum::has('some_key'));
    }

    public function testExists()
    {
        $this->assertTrue(MyEnum::exists('some_value'));
    }

    public function testCount()
    {
        $this->assertIsInt(MyEnum::count());
    }

    public function testToArray()
    {
        $this->assertIsArray(MyEnum::toArray());
    }
}
