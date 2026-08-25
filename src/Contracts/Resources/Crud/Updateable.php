<?php

namespace Mezai\Visma\Contracts\Resources\Crud;

trait Updateable
{
    public function update(int|string $id, array $data): object
    {
        return $this->client->put($this->getEndpoint() . "/$id", $data);
    }
}
