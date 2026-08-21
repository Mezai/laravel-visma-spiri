<?php

namespace Mezai\Visma;

class Resource implements \ArrayAccess, \Countable, \JsonSerializable
{
    /**
     * @var array<string, mixed>
     */
    protected array $attributes;

    /**
     * @param array<string, mixed> $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function __set(string $key, mixed $value)
    {
        if (in_array($key, ['id', 'instructionUUID', 'consentId'])) {
            if (!Uuid::validate($value)) {
                throw new InvalidUuidException();
            }
        }

        $this->attributes[$key] = $value;
    }

    public function __get(string $key): mixed
    {
        return $this->attributes[$key];
    }

    public function __isset(string $key): bool
    {
        return isset($this->attributes[$key]);
    }
}
