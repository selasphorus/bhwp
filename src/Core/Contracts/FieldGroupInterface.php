<?php
/**
 * Interface for all BhWP ACF Field Groups.
 *
 * Developers: Please follow BhWP Field Group standards.
 * See: /docs/FieldGroupStandards.md
 */

namespace atc\BhWP\Core\Contracts;

interface FieldGroupInterface
{
    public static function register(): void;
    //public static function getPostTypes(): array;
}
