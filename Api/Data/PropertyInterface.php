<?php

namespace My\PropertySystem\Api\Data;

/**
 * Interface PropertyInterface
 *
 * @package My\PropertySystem\Api\Data
 */
interface PropertyInterface
{
    /**
     *
     */
    const PROPERTY_SYSTEM_TABLE_NAME = 'property_system';

    /**
     *
     */
    const ENTITY_ID = 'entity_id';

    /**
     *
     */
    const COUNTY = 'county';

    /**
     *
     */
    const COUNTRY = 'country';

    /**
     *
     */
    const TOWN = 'town';

    /**
     *
     */
    const DESCRIPTIONS = 'descriptions';

    /**
     *
     */
    const ADDRESS = 'address';

    /**
     *
     */
    const IMAGE_URL = 'image_url';

    /**
     *
     */
    const THUMBNAIL_URL = 'thumbnail_url';

    /**
     *
     */
    const LATITUDE = 'latitude';

    /**
     *
     */
    const LONGITUDE = 'longitude';

    /**
     *
     */
    const BEDROOMS = 'bedrooms';

    /**
     *
     */
    const BATHROOMS = 'bathrooms';

    /**
     *
     */
    const PRICE = 'price';

    /**
     *
     */
    const PROPERTY_TYPE = 'property_type';

    /**
     *
     */
    const PROPERTY_STATE = 'property_state';

    /**
     * @param int $entityId
     * @return PropertyInterface
     */
    public function setEntityId(int $entityId): PropertyInterface;

    /**
     * @param string $county
     * @return PropertyInterface
     */
    public function setCounty(string $county): PropertyInterface;

    /**
     * @param string $country
     * @return PropertyInterface
     */
    public function setCountry(string $country): PropertyInterface;

    /**
     * @param string $town
     * @return PropertyInterface
     */
    public function setTown(string $town): PropertyInterface;

    /**
     * @param string $descriptions
     * @return PropertyInterface
     */
    public function setDescriptions(string $descriptions): PropertyInterface;

    /**
     * @param string $imageUrl
     * @return PropertyInterface
     */
    public function setImageUrl(string $imageUrl): PropertyInterface;

    /**
     * @param string $address
     * @return PropertyInterface
     */
    public function setAddress(string $address): PropertyInterface;

    /**
     * @param string $thumbnailUrl
     * @return PropertyInterface
     */
    public function setThumbnailUrl(string $thumbnailUrl): PropertyInterface;

    /**
     * @param float $latitude
     * @return PropertyInterface
     */
    public function setLatitude(float $latitude): PropertyInterface;

    /**
     * @param float $longitude
     * @return PropertyInterface
     */
    public function setLongitude(float $longitude): PropertyInterface;

    /**
     * @param float $price
     * @return PropertyInterface
     */
    public function setPrice(float $price): PropertyInterface;

    /**
     * @param int $bedrooms
     * @return PropertyInterface
     */
    public function setBedrooms(int $bedrooms): PropertyInterface;

    /**
     * @param int $bathrooms
     * @return PropertyInterface
     */
    public function setBathrooms(int $bathrooms): PropertyInterface;

    /**
     * @param int $propertyType
     * @return PropertyInterface
     */
    public function setPropertyType(int $propertyType): PropertyInterface;

    /**
     * @param string $propertyState
     * @return PropertyInterface
     */
    public function setPropertyState(string $propertyState): PropertyInterface;
}