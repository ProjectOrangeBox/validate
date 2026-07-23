<?php

declare(strict_types=1);

namespace orange\validate\rules;

use orange\validate\rules\RuleAbstract;

/**
 * default rules
 *
 * These can be overridden by providing additional rules in the validation configuration file
 * You can also override these by simply pointing to your own class and method
 */
class Cast extends RuleAbstract
{
    public function number(): void
    {
        $this->float();
    }

    public function integer(): void
    {
        $this->input = (int)$this->input;
    }

    public function int(): void
    {
        $this->integer();
    }

    public function string(): void
    {
        $this->input = (string)$this->input;
    }

    public function bool(): void
    {
        $this->input = match (strtolower((string)$this->input)) {
            'y', '1' => true,
            default => false,
        };
    }

    public function boolean(): void
    {
        $this->bool();
    }

    public function array(): void
    {
        $this->input = (array)$this->input;
    }

    public function float(): void
    {
        $this->input = (float)$this->input;
    }
}
