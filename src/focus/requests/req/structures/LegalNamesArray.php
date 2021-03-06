<?php

namespace unapi\kontur\focus\requests\req\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\req\definitions\LegalName;

class LegalNamesArray implements \IteratorAggregate, DtoInterface
{
    /** @var LegalName[] */
    private $list;

    /**
     * LegalNames constructor.
     * @param LegalName[] $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->list);
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        return new self(array_map([LegalName::class, 'toDto'], $data));
    }
}