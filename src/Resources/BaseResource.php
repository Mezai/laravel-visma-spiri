<?php

namespace Mezai\Visma\Resources;

use Mezai\Visma\VismaClient;
use Illuminate\Support\Str;
use ReflectionClass;

abstract class BaseResource
{
    public array $query = [];
    protected string $endpoint;

    public function __construct(
        public VismaClient $client
    ) {}

    abstract protected function getEndpoint(): string;

    protected function getSingularKey(): string
    {
        return Str::studly((new ReflectionClass($this))->getShortName());
    }

    protected function getPluralKey(): string
    {
        return Str::pluralStudly($this->getSingularKey());
    }
}
