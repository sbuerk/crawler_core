<?php declare(strict_types=1);

namespace SBUERK\CrawlerCore\Items;

/**
 * Class CollectionItem
 *
 * @package SBUERK\CrawlerCore\Items
 */
class CollectionItem extends AbstractItem
{

    /** @var string[] */
    protected $_properties = [
        'id',
        'crdate',
        'total',
        'finished',
        'description'
    ];

    /** @var int|null */
    private $id;

    /** @var int */
    private $crdate = 0;

    /** @var int */
    private $total = 0;

    /** @var int */
    private $finished = 0;

    /** @var string */
    private $description = '';

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CollectionItem
     */
    public function setId(?int $id): CollectionItem
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
     * @return CollectionItem
     */
    public function setCrdate(int $crdate): CollectionItem
    {
        $this->crdate = $crdate;
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
     * @return CollectionItem
     */
    public function setTotal(int $total): CollectionItem
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return int
     */
    public function getFinished(): int
    {
        return $this->finished;
    }

    /**
     * @param int $finished
     * @return CollectionItem
     */
    public function setFinished(int $finished): CollectionItem
    {
        $this->finished = $finished;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return CollectionItem
     */
    public function setDescription(string $description): CollectionItem
    {
        $this->description = $description;
        return $this;
    }

}
