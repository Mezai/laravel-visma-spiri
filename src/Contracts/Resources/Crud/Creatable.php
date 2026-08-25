<?php

namespace Mezai\Visma\Contracts\Resources\Crud;

trait Createable
{
    public function create(array $data): object
    {
        return $this->client->post($this->getEndpoint(), $data);
    }
}
