<?php

namespace Shafeekb\PropertySystem\Model\Property;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Ui\DataProvider\ModifierPoolDataProvider;
use Shafeekb\PropertySystem\Api\Data\PropertyInterface;
use Shafeekb\PropertySystem\Model\ResourceModel\Property\CollectionFactory;

/**
 * Class DataProvider
 *
 * @package Shafeekb\PropertySystem\Model\Property
 */
class DataProvider extends ModifierPoolDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * DataProvider constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     * @param PoolInterface|null $pool
     * @return void
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * Get form data
     *
     * @return array
     */
    public function getData(): array
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        /** @var PropertyInterface $property */
        foreach ($items as $property) {
            $this->setLoadedData($property);
        }
        $data = $this->dataPersistor->get(PropertyInterface::PROPERTY_SYSTEM_TABLE_NAME);
        if (!empty($data)) {
            $property = $this->collection->getNewEmptyItem();
            $property->setData($data);
            $this->setLoadedData($property);
            $this->dataPersistor->clear(PropertyInterface::PROPERTY_SYSTEM_TABLE_NAME);
        }

        return $this->loadedData;
    }

    /**
     * Set loaded data
     *
     * @param PropertyInterface $property
     * @return void
     */
    private function setLoadedData(PropertyInterface $property)
    {
        $this->loadedData[$property->getId()] = $property->getData();
    }
}