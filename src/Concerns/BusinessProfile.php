<?php

namespace DigitalClosuxe\Business\Profile\Concerns;

trait BusinessProfile
{
    /** [@inheritdoc] */
    public function isActive(): bool
    {
        return false;
    }

    /** [@inheritdoc] */
    public function daysSinceActive(): string
    {
        return '0 days';
    }
}