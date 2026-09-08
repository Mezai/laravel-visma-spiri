<?php

namespace Mezai\Visma\Resources;

use Mezai\Visma\Contracts\Resources\Crud\Readable;

class ArticleAccountCoding extends BaseResource
{
    use Readable;

    protected function getEndpoint(): string
    {
        return 'articleaccountcodings';
    }
}
