<?php

namespace Mezai\Visma\Resources;

use Mezai\Visma\Contracts\Resources\Crud\Readable;

class TermsOfPayment extends BaseResource
{
    use Readable;

    public function all(): object
    {
        return $this->client->get($this->getEndpoint(), $this->query);
    }

    protected function getEndpoint(): string
    {
        return 'termsofpayments';
    }
}
