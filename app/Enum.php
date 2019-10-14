<?php

namespace App;

use ReflectionClass;

/**
 * A basic enum class. It can't guarantee type safety, but it can be helpful
 * when reflection is needed. Use is simple:
 *
 *     class Day extends Enum {
 *         const sunday    = 0;
 *         const monday    = 1;
 *         const tuesday   = 2;
 *         const wednesday = 3;
 *         const thursday  = 4;
 *         const friday    = 5;
 *         const saturday  = 6;
 *     }
 *
 *     $favoriteDayOfTheWeek = Day::friday;
 *
 * Because installing SPL_Types just for `SplEnum` requires more effort than
 * it's worth.
 */
abstract class Enum
{
    /**
     * Get the names of the constants of the enumerated type.
     *
     * @return array
     */
    public static function keys()
    {
        return array_keys(static::constants());
    }

    /**
     * Get the values of the constants of the enumerated type.
     *
     * @return array
     */
    public static function values()
    {
        return array_values(static::constants());
    }

    /** @noinspection PhpDocMissingThrowsInspection */
    /**
     * Get an associative array of the constants of the enumerated type.
     *
     * @return array
     */
    public static function constants() {
        return (new ReflectionClass(static::class))->getConstants();
    }
}
