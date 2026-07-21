<?php

declare(strict_types=1);

namespace orange\validate\interfaces;

/**
 * Defines the contract for binding and invoking remapping rule sets.
 *
 * @package orange\validate\interfaces
 */
interface RemapInterface
{
    public function __set(string $setName, array $value): void;
    public function set(string $setName, array $value): self;
    public function __call($setName, $arguments): mixed;
}
