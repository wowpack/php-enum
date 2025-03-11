<?php

namespace Wowpack\Enumeration;

use Illuminate\Support\Collection;

trait InteractsWithEnum
{
    /**
     * Convert full enum
     */
    public static function all(): Collection
    {
        return Collection::make(self::cases());
    }

    /**
     * Get all enum case names as array
     *
     * @return array<int, string>
     */
    public static function keys(): array
    {
        return static::all()->pluck('name')->toArray();
    }

    /**
     * Get all enum case values as array
     *
     * @return array<int, string>
     */
    public static function values(): array
    {
        return static::all()->pluck('value')->toArray();
    }

    /**
     * Get all enum cases as associative array
     *
     * @return array<string, string>
     */
    public static function assoc(): array
    {
        return static::all()->pluck('value', 'name')->toArray();
    }

    /**
     * Get a value using it's key
     *
     * @return static|mixed
     */
    public static function get(string $key, $default = null): mixed
    {
        return static::all()->where('name', $key)->first(default: $default);
    }

    /**
     * Check if item is exists
     */
    public static function has(string $key): bool
    {
        return ! empty(static::get($key, null));
    }

    /**
     * Check if item is exists
     */
    public static function exists(int|string $value): bool
    {
        return ! empty(static::all()->where('value', $value)->first());
    }

    /**
     * Count total of cases
     */
    public static function count(): int
    {
        return static::all()->count();
    }

    /**
     * Convert all enum into an array
     *
     * @return array<string, string>
     */
    public static function toArray(): array
    {
        return [
            'context' => static::class,
            'data' => static::all()
                ->pluck('value', 'name')
                ->toArray(),
            'total' => static::all()->count(),
        ];
    }

    /**
     * Get the name of enum case
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Get the value of enum case
     */
    public function value(): string|int
    {
        return $this->value;
    }
}