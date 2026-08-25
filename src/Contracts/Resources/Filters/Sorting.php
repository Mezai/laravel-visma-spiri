<?php

namespace Mezai\Visma\Contracts\Resources\Filters;

trait Sorting
{
    public function orderBy(string $query): static
    {
        $this->query['orderby'] = $query;

        return $this;
    }
}
