<?php

namespace Mezai\Visma\Contracts\Resources\Filters;

trait Pagination
{
    public function page(int $page): static
    {
        $this->query['page'] = $page;

        return $this;
    }

    public function pageSize(int $size): static
    {
        $this->query['pagesize'] = $size;

        return $this;
    }

}
