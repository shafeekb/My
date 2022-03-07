<?php

namespace My\PropertySystem\Api;

use Exception;
use My\PropertySystem\Api\Data\PropertyInterface;

interface PropertyRepositoryInterface
{
    /**
     * Get data by id
     *
     * @param int $id
     * @return PropertyInterface
     * @throws Exception
     */
    public function getById(int $id): PropertyInterface;

    /**
     * Save data
     *
     * @param PropertyInterface $property
     * @return PropertyInterface
     */
    public function save(PropertyInterface $property): PropertyInterface;
}