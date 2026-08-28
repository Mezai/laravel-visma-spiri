<?php 


namespace Mezai\Visma\Resources;

use Mezai\Visma\Contracts\Resources\Crud\Readable;

class TermsOfPayment extends BaseResource
{
	use Readable;

	protected function getEndpoint(): string
    {
        return 'termsofpayments';
    }
}