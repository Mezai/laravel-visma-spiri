<?php

namespace Mezai\Visma\Contracts\Resources\Filters;

trait Selecting
{
    public function select(string $query): static
    {
        $this->query['select'] = $query;

        return $this;
    }
}
