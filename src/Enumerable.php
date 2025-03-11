<?php

namespace Wowpack\Enumeration;

use Illuminate\Support\Collection;

interface Enumerable
{
    public static function all(): Collection;

    public static function keys(): array;

    public static function values(): array;

    public static function assoc(): array;

    public static function get(string $key, $default = null): mixed;

    public static function has(string $key): bool;

    public static function exists(string $value): bool;

    public static function count(): int;

    public static function toArray(): array;

    public function name(): string;

    public function value(): string|int;
}