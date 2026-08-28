<?php

namespace Mezai\Visma\Facades;

use Mezai\Visma\Resources\CustomerInvoice;
use Mezai\Visma\Resources\TermsOfPayment;
use Mezai\Visma\Resources\Customer;
use Illuminate\Support\Facades\Facade;

/**
 * @method static CustomerInvoice invoices()
 * @method static TermsOfPayment terms()
 * @method static Customer customers()
 **/
class Visma extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-visma';
    }
}
