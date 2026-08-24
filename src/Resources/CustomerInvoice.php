<?php

namespace Mezai\Visma\Resources;

class CustomerInvoice extends AbstractResource
{
    protected function getEndpoint(): string
    {
        return 'customerinvoices';
    }

}
