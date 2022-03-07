<?php

namespace Shafeekb\PropertySystem\Model\ResourceModel\Property;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Shafeekb\PropertySystem\Api\Data\PropertyInterface;
use Shafeekb\PropertySystem\Model\Property;
use Shafeekb\PropertySystem\Model\ResourceModel\Property as PropertyResource;

/**
 * Class Collection
 *
 * @package Shafeekb\PropertySystem\Model\ResourceModel\Property
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