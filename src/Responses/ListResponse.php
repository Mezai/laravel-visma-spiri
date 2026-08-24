<?php

namespace Mezai\Visma\Responses;

use Illuminate\Support\Collection;

class ListResponse
{
    public int $totalRecords;
    public int $totalPages;
    public int $currentPage;
    protected Collection $data;

    public function __construct(object $raw)
    {
        $this->totalRecords = $raw->TotalItemCount;
        $this->totalPages = $raw->TotalPages;
        $this->currentPage = $raw->Page;
        $this->data = collect($raw->{"Data"});
    }

    public function hasMore(): bool
    {
        return $this->currentPage < $this->totalPages;
    }

    public function get(): Collection
    {
        return $this->data;
    }

}
