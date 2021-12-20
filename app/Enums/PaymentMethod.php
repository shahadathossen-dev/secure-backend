<?php

namespace App\Enums;

/**
 * @method static PaymentMethod PAYPAL()
 * @method static PaymentMethod STRIPE()
 */
class PaymentMethod extends Enum
{
    private const PAYPAL  = 'payple';
    private const STRIPE  = 'stripe';
}
