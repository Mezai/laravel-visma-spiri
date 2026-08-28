<?php

namespace Mezai\Visma\Resources;

use Mezai\Visma\Contracts\Resources\Crud\Readable;
use Mezai\Visma\Contracts\Resources\Filters\FiltersFilter;

class TermsOfPayment extends BaseResource
{
    use Readable;
    use FiltersFilter;

    public function stripe(): static
    {
        return $this->filter("Name eq 'Stripe'");
    }

    public function swish(): static
    {
        return $this->filter("NameEnglish eq 'Swish direct payment'");
    }

    protected function getEndpoint(): string
    {
        return 'termsofpayments';
    }
}
