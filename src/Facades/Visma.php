<?php

namespace Mezai\Visma\Facades;

use Mezai\Visma\Resources\CustomerInvoice;
use Mezai\Visma\Resources\TermsOfPayment;
use Illuminate\Support\Facades\Facade;

/**
 * @method static CustomerInvoice invoices()
 * @method static TermsOfPayment terms()
 **/
class Visma extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-visma';
    }
}
