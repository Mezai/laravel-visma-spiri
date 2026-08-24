<?php

namespace Mezai\Visma;

use Mezai\Visma\Resources\CustomerInvoice;

class Visma
{
    public function __construct(
        protected VismaClient $client
    ) {}


    public function invoices(): CustomerInvoice
    {
        return new CustomerInvoice($this->client);
    }

}
