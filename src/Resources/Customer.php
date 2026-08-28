<?php

namespace Mezai\Visma\Resources;

use Mezai\Visma\Contracts\Resources\Crud\Createable;
use Mezai\Visma\Contracts\Resources\Crud\Deleteable;
use Mezai\Visma\Contracts\Resources\Crud\Readable;
use Mezai\Visma\Contracts\Resources\Crud\Updateable;

class Customer extends BaseResource
{
    use Readable;
    use Createable;
    use Deleteable;
    use Updateable;

    protected function getEndpoint(): string
    {
        return 'customers';
    }
}
