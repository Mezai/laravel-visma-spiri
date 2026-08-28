<?php

namespace Mezai\Visma;

use Mezai\Visma\Resources\CustomerInvoice;
use Mezai\Visma\Resources\TermsOfPayment;
use Mezai\Visma\Resources\Customer;

class Visma
{
    public function __construct(
        protected VismaClient $client
    ) {}


    public function invoices(): CustomerInvoice
    {
        return new CustomerInvoice($this->client);
    }

    public function terms(): TermsOfPayment
    {
        return new TermsOfPayment($this->client);
    }

    public function customers(): Customer
    {
        return new Customer($this->client);
    }

}
