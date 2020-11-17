<?php

namespace DigitalClosuxe\Business\Profile\Contracts;

/**
 * Class Profile
 */
interface Profile
{
    /**
     * Checks whether a Profile is active or not
     */
    public function isActive(): bool;

    /**
     * Return a Human-Readable DateTime instance
     */
    public function daysSinceActive(): string;
}