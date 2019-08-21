<?php

namespace unapi\kontur\focus\objects\lists;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\objects\Document;

class Documents implements \IteratorAggregate, DtoInterface
{
    /** @var Document[] */
    private $list;

    /**
     * Documents constructor.
     * @param Document[] $list
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
        return new self(array_map([Document::class, 'toDto'], $data));
    }
}