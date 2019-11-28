<?php declare(strict_types=1);

namespace SBUERK\CrawlerCore\Service;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\MessageInterface;
use SBUERK\CrawlerCore\Items\AbstractItem;
use SBUERK\CrawlerCore\Items\CollectionItem;
use SBUERK\CrawlerCore\Items\FrontendItem;
use SBUERK\CrawlerCore\Items\ProcessItem;
use SBUERK\CrawlerCore\Items\QueueItem;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use function GuzzleHttp\Psr7\str;

/**
 * Class ItemService
 *
 * @package SBUERK\CrawlerCore\Service
 */
class ItemService
{

    /** @var Connection */
    private $connection;

    /** @var ObjectManager */
    private $objectManager;

    /**
     * ItemService constructor.
     *
     * @param Connection|null $connection
     */
    public function __construct(
        Connection $connection  = null,
        ObjectManager $objectManager = null
    )
    {
        $this->connection = $connection ?? GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tx_crawlercore_queue');
        $this->objectManager = $objectManager ?? GeneralUtility::makeInstance(ObjectManager::class);
    }

    /**
     * @param Request               $request
     * @param int                   $typeId
     * @param int                   $priority
     * @param CollectionItem|null   $collection
     * @param ProcessItem|null      $process
     * @param array|null            $additionalData
     *
     * @return QueueItem|null
     */
    public function addQueue(
        Request $request,
        int $typeId = 0,
        int $priority = 0,
        CollectionItem $collection=null,
        ProcessItem $process=null,
        array $additionalData=null
    ): ?QueueItem
    {

        $data = [
            'request_data'      => $this->messageToString($request),
            'type_id'           => $typeId,
            'priority'          => $priority,
            'collection_id'     => ($collection ? $collection->getId() : null),
            'process_id'        => ($process ? $process->getId() : null),
            'additional_data'   => $additionalData,
        ];
        if ($item = $this->createItemInstance(QueueItem::class, $data))
            if ($this->saveItem($item))
                return $item;

        return NULL;
    }

    /**
     * @param string        $description
     * @param array|null    $additionalData
     *
     * @return CollectionItem|null
     */
    public function addCollection(string $description, array $additionalData=null)
    {
        $data = [
            'description'       => $description,
            'additional_data'   => $additionalData,
        ];
        if ($item = $this->createItemInstance(CollectionItem::class, $data))
            if ($this->saveItem($item))
                return $item;

        return NULL;
    }



    /**
     * @param string $name Item name (CollectionItem::class|FrontendItem::class|ProcessItem::class|QueueItem::class)
     * @param array|null $data
     *
     * @return AbstractItem|FrontendItem|CollectionItem|QueueItem|ProcessItem
     */
    public function createItemInstance(string $name, array $data=null): AbstractItem
    {
        //--------------------------------------------------------------------------------------------------------------
        // checks
        //--------------------------------------------------------------------------------------------------------------
        if (empty($name))
            throw new \InvalidArgumentException("argument \$name must not be empty");
        //--------------------------------------------------------------------------------------------------------------

        //--------------------------------------------------------------------------------------------------------------
        // create instance
        //--------------------------------------------------------------------------------------------------------------
        $instance = $this->objectManager->get($name);
        if (!$instance)
            throw new \RuntimeException("Could not instantiate class $name");
        if (! $instance instanceof AbstractItem )
            throw new \RuntimeException(get_class($instance) . " is not instance of " . AbstractItem::class);
        //--------------------------------------------------------------------------------------------------------------

        //--------------------------------------------------------------------------------------------------------------
        // prepare data
        //--------------------------------------------------------------------------------------------------------------
        if ($data)
        {
            // @todo implement data prepare hook
        }
        //--------------------------------------------------------------------------------------------------------------

        //--------------------------------------------------------------------------------------------------------------
        // set data
        //--------------------------------------------------------------------------------------------------------------
        if ($data)
        {
            // @todo implement pre data set hook

            $instance->setData($data);

            // @todo implement post data set hook
        }
        //--------------------------------------------------------------------------------------------------------------

        return $instance;
    }

    public function saveItem(AbstractItem &$item)
    {
        list($table, $idField) = $this->getTableAndIdFieldName($item);
        if (!$table || $idField)
            return FALSE;

        $data       = $item->getData();
        $id         = $data[$idField] ?? null;
        unset($data[$idField]);

        // @todo prepare data for database save hook

        if ($id > 0)
        {
            $this->connection->update(
                $table,
                $data,
                ['id' => $id]
            );
            return TRUE;
        } else {

            // @todo eventually move to prepare hook, if implmeneted
            if (isset($data['crdate']) && empty($data['crdate']))
                $data['crdate'] = time();

            if ($this->connection->insert($table, $data))
                if ($id = $this->connection->lastInsertId($table, 'id'))
                {
                    $item->setData([$idField => (int)$id]);
                    return TRUE;
                }
        }

        return FALSE;
    }

    /**
     * @param AbstractItem $item
     * @return array<null|string,null|string>
     */
    protected function getTableAndIdFieldName(AbstractItem $item)
    {
        switch(TRUE)
        {
            case ($item instanceof ProcessItem):
                    return ['tx_crawlercore_process', 'id'];
                break;

            case ($item instanceof QueueItem):
                    return ['tx_crawlercore_queue', 'id'];
                break;

            case ($item instanceof CollectionItem):
                    return ['tx_crawlercore_collection', 'id'];

            default:

                // @todo implement hook if needed for further detection or maybe configuration array ?!

                return [NULL, NULL];
        }
    }

    /**
     * @param MessageInterface $message
     * @return string
     */
    public function messageToString(MessageInterface $message)
    {
        return \GuzzleHttp\Psr7\str($message);
    }

    /**
     * @param string $message
     * @return Request
     */
    public function stringToRequest(string $message): Request
    {
        return \GuzzleHttp\Psr7\parse_request($message);
    }

    /**
     * @param string $message
     * @return Response
     */
    public function stringToResponse(string $message): Response
    {
        return \GuzzleHttp\Psr7\parse_response($message);
    }

    /**
     * @return ItemService
     */
    protected function startTransaction(): ItemService
    {
        if (!$this->connection->isTransactionActive())
            $this->connection->beginTransaction();

        return $this;
    }

    /**
     * @return ItemService
     *
     * @throws \Doctrine\DBAL\ConnectionException
     */
    protected function commit(): ItemService
    {
        if ($this->connection->isTransactionActive())
            $this->connection->commit();

        return $this;
    }

    /**
     * @return ItemService
     *
     * @throws \Doctrine\DBAL\ConnectionException
     */
    protected function rollback(): ItemService
    {
        if ($this->connection->isTransactionActive())
            $this->connection->rollBack();

        return $this;
    }
}
