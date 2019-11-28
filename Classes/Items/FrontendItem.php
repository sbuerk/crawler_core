<?php declare(strict_types=1);

namespace SBUERK\CrawlerCore\Items;

/**
 * Class FrontendItem
 *
 * @package SBUERK\CrawlerCore\Items
 */
class FrontendItem extends AbstractItem
{

    /** @var string[] */
    protected $_properties = [
        'running',
        'item',
    ];

    private $running = false;

    /** @var null|QueueItem */
    private $item;

    /**
     * @return bool
     */
    public function getRunning(): bool
    {
        return $this->running;
    }

    /**
     * @param bool $running
     * @return FrontendItem
     */
    public function setRunning(bool $running): FrontendItem
    {
        $this->running = $running;
        return $this;
    }

    /**
     * @return QueueItem|null
     */
    public function getItem(): QueueItem
    {
        return $this->item;
    }

    /**
     * @param QueueItem|null $item
     * @return FrontendItem
     */
    public function setItem(QueueItem $item): FrontendItem
    {
        $this->item = $item;
        return $this;
    }

}
