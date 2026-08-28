<?php

namespace Mezai\Visma\Responses;

use Illuminate\Support\Collection;

class ListResponse
{
    public int $totalResults;
    public int $totalPages;
    public int $pageSize;
    public int $currentPage;
    protected Collection $data;

    public function __construct(object $raw)
    {
        $this->totalResults = $raw->{"Meta"}->TotalNumberOfResults;
        $this->totalPages = $raw->{"Meta"}->TotalNumberOfPages;
        $this->currentPage = $raw->{"Meta"}->CurrentPage;
        $this->pageSize = $raw->{"Meta"}->PageSize;
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
