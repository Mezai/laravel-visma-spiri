<?php

namespace Mezai\Visma\Contracts\Resources\Filters;

trait FiltersFilter
{
    public function filter(string $filter): static
    {
        $this->query['filter'] = $filter;

        return $this;
    }

    public function and()
    {
        $this->query['filter'] .= ' and ';

        return $this;
    }

    public function or()
    {
        $this->query['filter'] .= ' or ';

        return $this;

    }

}
