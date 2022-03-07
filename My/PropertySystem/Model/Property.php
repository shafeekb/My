<?php

namespace My\PropertySystem\Model;

use Magento\Framework\Model\AbstractModel;
use My\PropertySystem\Api\Data\PropertyInterface;

/**
 * Class Property
 *
 * @package My\PropertySystem\Model
 */
class Property extends AbstractModel implements PropertyInterface
{
    /**
     * Property constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\Property::class);
    }

    /**
     * @param int $entityId
     * @return PropertyInterface
     */
    public function setEntityId($entityId): PropertyInterface
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @return string
     */
    public function getCounty(): string
    {
        return $this->_getData(self::COUNTY);
    }

    /**
     * @param string $county
     * @return PropertyInterface
     */
    public function setCounty(string $county): PropertyInterface
    {
        return $this->setData(self::COUNTY, $county);
    }

    /**
     * @param string $country
     * @return PropertyInterface
     */
    public function setCountry(string $country): PropertyInterface
    {
        return $this->setData(self::COUNTRY, $country);
    }

    /**
     * @param string $town
     * @return PropertyInterface
     */
    public function setTown(string $town): PropertyInterface
    {
        return $this->setData(self::TOWN, $town);
    }

    /**
     * @param string $descriptions
     * @return PropertyInterface
     */
    public function setDescriptions(string $descriptions): PropertyInterface
    {
        return $this->setData(self::DESCRIPTIONS, $descriptions);
    }

    /**
     * @param string $imageUrl
     * @return PropertyInterface
     */
    public function setImageUrl(string $imageUrl): PropertyInterface
    {
        return $this->setData(self::IMAGE_URL, $imageUrl);
    }

    /**
     * @param string $address
     * @return PropertyInterface
     */
    public function setAddress(string $address): PropertyInterface
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * @param string $thumbnailUrl
     * @return PropertyInterface
     */
    public function setThumbnailUrl(string $thumbnailUrl): PropertyInterface
    {
        return $this->setData(self::THUMBNAIL_URL, $thumbnailUrl);
    }

    /**
     * @param float $latitude
     * @return PropertyInterface
     */
    public function setLatitude(float $latitude): PropertyInterface
    {
        return $this->setData(self::LATITUDE, $latitude);
    }

    /**
     * @param float $longitude
     * @return PropertyInterface
     */
    public function setLongitude(float $longitude): PropertyInterface
    {
        return $this->setData(self::LONGITUDE, $longitude);
    }

    /**
     * @param float $price
     * @return PropertyInterface
     */
    public function setPrice(float $price): PropertyInterface
    {
        return $this->setData(self::PRICE, $price);
    }

    /**
     * @param int $bedrooms
     * @return PropertyInterface
     */
    public function setBedrooms(int $bedrooms): PropertyInterface
    {
        return $this->setData(self::BEDROOMS, $bedrooms);
    }

    /**
     * @param int $bathrooms
     * @return PropertyInterface
     */
    public function setBathrooms(int $bathrooms): PropertyInterface
    {
        return $this->setData(self::BATHROOMS, $bathrooms);
    }

    /**
     * @param int $propertyType
     * @return PropertyInterface
     */
    public function setPropertyType(int $propertyType): PropertyInterface
    {
        return $this->setData(self::PROPERTY_TYPE, $propertyType);
    }

    /**
     * @param string $propertyState
     * @return PropertyInterface
     */
    public function setPropertyState(string $propertyState): PropertyInterface
    {
        return $this->setData(self::PROPERTY_STATE, $propertyState);
    }
}