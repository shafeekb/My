<?php

namespace My\PropertySystem\Model;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use My\PropertySystem\Api\Data\PropertyInterface;
use My\PropertySystem\Api\PropertyRepositoryInterface;
use My\PropertySystem\Model\ResourceModel\Property as PropertyResource;

/**
 * Class PropertyRepository
 *
 * @package My\PropertySystem\Model
 */
class PropertyRepository implements PropertyRepositoryInterface
{
    /**
     * @var PropertyFactory
     */
    protected $propertyFactory;

    /**
     * @var PropertyResource
     */
    protected $propertyResource;

    /**
     * PropertyRepository constructor
     *
     * @param PropertyFactory $propertyFactory
     * @param PropertyResource $propertyResource
     * @return void
     */
    public function __construct(
        PropertyFactory $propertyFactory,
        PropertyResource $propertyResource
    ) {
        $this->propertyFactory = $propertyFactory;
        $this->propertyResource = $propertyResource;
    }

    /**
     * Get data by id
     *
     * @param int $id
     * @return PropertyInterface
     * @throws Exception
     */
    public function getById(int $id): PropertyInterface
    {
        $property = $this->propertyFactory->create();
        $this->propertyResource->load($property, $id);
        if (!$property->getId()) {
            throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
        }

        return $property;
    }

    /**
     * Save data
     *
     * @param PropertyInterface $property
     * @return PropertyInterface
     * @throws CouldNotSaveException
     */
    public function save(PropertyInterface $property): PropertyInterface
    {
        try {
            $this->propertyResource->save($property);
        } catch (Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $property;
    }
}