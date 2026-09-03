<?php

namespace Mezai\Visma\Resources;

use Mezai\Visma\Contracts\Resources\Crud\Createable;
use Mezai\Visma\Contracts\Resources\Crud\Readable;
use Mezai\Visma\Contracts\Resources\Crud\Updateable;

class Article extends BaseResource
{
    use Readable;
    use Createable;
    use Updateable;

    protected function getEndpoint(): string
    {
        return 'articles';
    }
}
