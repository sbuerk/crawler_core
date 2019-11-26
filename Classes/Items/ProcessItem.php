<?php declare(strict_types=1);

namespace SBUERK\CrawlerCore\Items;

/**
 * Class ProcessItem
 *
 * @package SBUERK\CrawlerCore\Items
 */
class ProcessItem
{
    /** @var int|null */
    private $id;

    /** @var int */
    private $crdate = 0;

    /** @var int */
    private $type_id = 0;

    /** @var int */
    private $process_id = 0;

    /** @var string */
    private $uuid = '';

    /** @var bool */
    private $active = false;

    /** @var bool */
    private $deleted = false;

    /** @var int */
    private $ttl = 0;

    /** @var int */
    private $max_items = 0;

    /** @var int */
    private $total = 0;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProcessItem
     */
    public function setId(?int $id): ProcessItem
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->type_id;
    }

    /**
     * @param int $type_id
     * @return ProcessItem
     */
    public function setTypeId(int $type_id): ProcessItem
    {
        $this->type_id = $type_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     * @return ProcessItem
     */
    public function setUuid(string $uuid): ProcessItem
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return ProcessItem
     */
    public function setActive(bool $active): ProcessItem
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     * @return ProcessItem
     */
    public function setDeleted(bool $deleted): ProcessItem
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }

    /**
     * @param int $ttl
     * @return ProcessItem
     */
    public function setTtl(int $ttl): ProcessItem
    {
        $this->ttl = $ttl;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return ProcessItem
     */
    public function setTotal(int $total): ProcessItem
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxItems(): int
    {
        return $this->max_items;
    }

    /**
     * @param int $max_items
     * @return ProcessItem
     */
    public function setMaxItems(int $max_items): ProcessItem
    {
        $this->max_items = $max_items;
        return $this;
    }

    /**
     * @return int
     */
    public function getProcessId(): int
    {
        return $this->process_id;
    }

    /**
     * @param int $process_id
     * @return ProcessItem
     */
    public function setProcessId(int $process_id): ProcessItem
    {
        $this->process_id = $process_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getCrdate(): int
    {
        return $this->crdate;
    }

    /**
     * @param int $crdate
     * @return ProcessItem
     */
    public function setCrdate(int $crdate): ProcessItem
    {
        $this->crdate = $crdate;
        return $this;
    }

}