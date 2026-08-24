<?php

namespace Mezai\Visma\Contracts\Resources\Crud;

use Mezai\Visma\Responses\ListResponse;

trait Readable
{
    public function all(): ListResponse
    {
        $raw = $this->client->get($this->getEndpoint(), $this->query);

        return new ListResponse($raw);
    }

    public function get(string|int $id): object
    {
        return $this->client->get($this->getEndpoint() . '/' . $id, $this->query)->{$this->getSingularKey()};
    }
}
