<?php

namespace Mezai\Visma\Resources;

use Mezai\Visma\Contracts\Resources\Crud\Createable;
use Mezai\Visma\Contracts\Resources\Crud\Deleteable;
use Mezai\Visma\Contracts\Resources\Crud\Readable;
use Mezai\Visma\Contracts\Resources\Filters\FiltersDates;
use Mezai\Visma\Contracts\Resources\Filters\FiltersFilter;

class CustomerInvoice extends AbstractResource
{
    use Readable;
    use Createable;
    use Deleteable;

    use FiltersDates;
    use FiltersFilter;


    protected function getEndpoint(): string
    {
        return 'customerinvoices';
    }

}
