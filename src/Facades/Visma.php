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
 * @method static BankAccount bankAccounts()
 * @method static Article articles()
 * @method static Unit units()
 * @method static ArticleAccountCoding articleaccountcodings()
 **/
class Visma extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-visma';
    }
}
