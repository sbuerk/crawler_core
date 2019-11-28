<?php declare(strict_types=1);

namespace SBUERK\CrawlerCore\Items;

/**
 * Class QueueItem
 *
 * @package SBUERK\CrawlerCore\Items
 */
class QueueItem extends AbstractItem
{
    /** @var string[] */
    protected $_properties = [
        'id',
        'crdate',
        'priority',
        'collection_id',
        'type_id',
        'external',
        'process_scheduled',
        'process_id',
        'process_completed',
        'request_data',
        'result_data',
    ];

    /** @var int|null */
    private $id;

    /** @var int */
    private $crdate = 0;

    /** @var int */
    private $priority = 0;

    /** @var int */
    private $collection_id = 0;

    /** @var int */
    private $type_id = 0;

    /** @var bool */
    private $external = false;

    /** @var bool */
    private $process_scheduled = false;

    /** @var int */
    private $process_id = 0;

    /** @var bool */
    private $process_completed = false;

    /** @var string */
    private $request_data = '';

    /** @var string */
    private $result_data = '';

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return QueueItem
     */
    public function setId(?int $id): QueueItem
    {
        $this->id = $id;
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
     * @return QueueItem
     */
    public function setCrdate(int $crdate): QueueItem
    {
        $this->crdate = $crdate;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     * @return QueueItem
     */
    public function setPriority(int $priority): QueueItem
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return int
     */
    public function getCollectionId(): int
    {
        return $this->collection_id;
    }

    /**
     * @param int $collection_id
     * @return QueueItem
     */
    public function setCollectionId(int $collection_id): QueueItem
    {
        $this->collection_id = $collection_id;
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
     * @return QueueItem
     */
    public function setTypeId(int $type_id): QueueItem
    {
        $this->type_id = $type_id;
        return $this;
    }

    /**
     * @return bool
     */
    public function getProcessScheduled(): bool
    {
        return $this->process_scheduled;
    }

    /**
     * @param bool $process_scheduled
     * @return QueueItem
     */
    public function setProcessScheduled(bool $process_scheduled): QueueItem
    {
        $this->process_scheduled = $process_scheduled;
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
     * @return QueueItem
     */
    public function setProcessId(int $process_id): QueueItem
    {
        $this->process_id = $process_id;
        return $this;
    }

    /**
     * @return bool
     */
    public function getProcessCompleted(): bool
    {
        return $this->process_completed;
    }

    /**
     * @param bool $process_completed
     * @return QueueItem
     */
    public function setProcessCompleted(bool $process_completed): QueueItem
    {
        $this->process_completed = $process_completed;
        return $this;
    }

    /**
     * @return array
     */
    public function getRequestData(): string
    {
        return $this->request_data;
    }

    /**
     * @param array $request_data
     * @return QueueItem
     */
    public function setRequestData(string $request_data): QueueItem
    {
        $this->request_data = (string)$request_data;
        return $this;
    }

    /**
     * @return array
     */
    public function getResultData(): string
    {
        return $this->result_data;
    }

    /**
     * @param array $result_data
     * @return QueueItem
     */
    public function setResultData(string $result_data): QueueItem
    {
        $this->result_data = (string)$result_data;
        return $this;
    }

    /**
     * @return bool
     */
    public function getExternal(): bool
    {
        return $this->external;
    }

    /**
     * @param bool $external
     * @return QueueItem
     */
    public function setExternal(bool $external): QueueItem
    {
        $this->external = $external;
        return $this;
    }

}
