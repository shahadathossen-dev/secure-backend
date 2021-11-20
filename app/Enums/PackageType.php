<?php

namespace App\Enums;

/**
 * @method static PackageType MONTHLY()
 * @method static PackageType BIMONTYLY()
 * @method static PackageType QUARTERLY()
 * @method static PackageType HALFYEARLY()
 * @method static PackageType YEARLY()
 */
class PackageType extends Enum
{
    // private const MONTHLY       = 'monthly';
    // private const BIMONTYLY     = 'bi_monthly';
    private const QUARTERLY     = 'quarterly';
    private const HALFYEARLY    = 'half_yearly';
    private const YEARLY        = 'yearly';
}
