<?php

namespace Mezai\Visma\Contracts\Resources\Filters;

trait FiltersDates
{
    public function from(Carbon $date): static
    {
        $this->query['filter'] .= 'ChangedUtc gt ' . $date->toIso8601String();

        return $this;
    }

    public function to(Carbon $date): static
    {
        $this->query['filter'] .= 'ChangedUtc lt ' . $date->toIso8601String();

        return $this;
    }

}
