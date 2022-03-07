<?php
/**
 * Property.php
 *
 * @package     PhpStorm
 * @author      shafeek.b@unic.com
 * @copyright   Copyright (c) 2022 Unic AG (http://www.unic.com)
 * @category    exampleproject
 */

namespace My\PropertySystem\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use My\PropertySystem\Api\Data\PropertyInterface;

class Property extends AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            PropertyInterface::PROPERTY_SYSTEM_TABLE_NAME,
            PropertyInterface::ENTITY_ID
        );
        $this->_isPkAutoIncrement = false;
    }
}