<?php declare(strict_types=1);

namespace SBUERK\CrawlerCore\Items;

/**
 * Class AbstractItem
 *
 * @package SBUERK\CrawlerCore\Items
 */
class AbstractItem
{

    /** @var string[] */
    protected $_properties = [];

    /**
     * @param array|null $data
     * @return AbstractItem
     */
    public function setData(array $data=null): AbstractItem
    {
        if (!$data)
            return $this;

        foreach($data AS $key => $value)
        {
            if (!in_array($key, $this->_properties, true)) continue;

            $setter = 'set' . str_replace('_','', ucwords($key, '_'));
            if (method_exists($this, $setter))
                $this->{$setter}($value);

        }

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }

}
