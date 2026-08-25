<?php

namespace Mezai\Visma\Facades;

use Mezai\Visma\Resources\CustomerInvoice;
use Illuminate\Support\Facades\Facade;

/**
 * @method static CustomerInvoice invoices()
 **/
class Visma extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-visma';
    }
}
