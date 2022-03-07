<?php

namespace My\PropertySystem\Model\ResourceModel\Property;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use My\PropertySystem\Api\Data\PropertyInterface;
use My\PropertySystem\Model\Property;
use My\PropertySystem\Model\ResourceModel\Property as PropertyResource;

/**
 * Class Collection
 *
 * @package My\PropertySystem\Model\ResourceModel\Property
 */
class Collection extends AbstractCollection
{
    /**
     * Id
     *
     * @var string
     */
    protected $_idFieldName = PropertyInterface::ENTITY_ID;

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'property_property_collection';

    /**
     * Name of event parameter
     *
     * @var string
     */
    protected $_eventObject = 'property_collection';
    /**
     * Collection class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            Property::class,
            PropertyResource::class
        );
    }
}