<?php

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Collection;
use Wowpack\Enumeration\Enumerable;

class MyEnum implements Enumerable
{
    private const ENUM_CASES = [
        ['name' => 'some_key', 'value' => 'some_value'],
        ['name' => 'another_key', 'value' => 'another_value'],
    ];

    public static function all(): Collection
    {
        return Collection::make(self::ENUM_CASES);
    }

    public static function keys(): array
    {
        return array_column(self::ENUM_CASES, 'name');
    }

    public static function values(): array
    {
        return array_column(self::ENUM_CASES, 'value');
    }

    public static function assoc(): array
    {
        return array_column(self::ENUM_CASES, 'value', 'name');
    }

    public static function get(string $key, $default = null): mixed
    {
        foreach (self::ENUM_CASES as $case) {
            if ($case['name'] === $key) {
                return $case;
            }
        }
        return $default;
    }

    public static function has(string $key): bool
    {
        return !empty(self::get($key, null));
    }

    public static function exists(int|string $value): bool
    {
        foreach (self::ENUM_CASES as $case) {
            if ($case['value'] === $value) {
                return true;
            }
        }
        return false;
    }

    public static function count(): int
    {
        return count(self::ENUM_CASES);
    }

    public static function toArray(): array
    {
        return self::ENUM_CASES;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string|int
    {
        return $this->value;
    }
}

class EnumerableTest extends TestCase
{
    public function testAll()
    {
        $this->assertInstanceOf(Collection::class, MyEnum::all());
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
