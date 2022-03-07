<?php

namespace My\PropertySystem\Controller\Adminhtml\Property;

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Serialize\SerializerInterface;
use My\PropertySystem\Api\PropertyRepositoryInterface;
use My\PropertySystem\Model\Api;
use My\PropertySystem\Model\PropertyFactory;
use Psr\Log\LoggerInterface;

/**
 * Class Sync
 *
 * @package My\PropertySystem\Controller\Adminhtml\Property
 */
class Sync extends Action
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var Api
     */
    protected $api;

    /**
     * @var PropertyRepositoryInterface
     */
    protected $propertyRepository;

    /**
     * @var PropertyFactory
     */
    protected $propertyFactory;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * Sync constructor
     *
     * @param Context $context
     * @param LoggerInterface $logger
     * @param Api $api
     * @param PropertyRepositoryInterface $propertyRepository
     * @param SerializerInterface $serializer
     * @param PropertyFactory $propertyFactory
     * @return void
     */
    public function __construct(
        Context $context,
        LoggerInterface $logger,
        Api $api,
        PropertyRepositoryInterface $propertyRepository,
        SerializerInterface $serializer,
        PropertyFactory $propertyFactory
    ) {
        parent::__construct($context);
        $this->logger = $logger;
        $this->api = $api;
        $this->propertyRepository = $propertyRepository;
        $this->propertyFactory = $propertyFactory;
        $this->serializer = $serializer;
    }

    /**
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        try {
            if ($content = $this->api->execute()) {
                $content = $this->serializer->unserialize($content);
                $items = $content['data'];
                foreach ($items as $data) {
                    $property = $this->propertyFactory->create()
                        ->setEntityId($data['uuid'])
                        ->setCounty($data['county'])
                        ->setCountry($data['country'])
                        ->setTown($data['town'])
                        ->setDescriptions($data['description'])
                        ->setAddress($data['address'])
                        ->setImageUrl($data['image_full'])
                        ->setThumbnailUrl($data['image_thumbnail'])
                        ->setLatitude($data['latitude'])
                        ->setLongitude($data['longitude'])
                        ->setBedrooms($data['num_bedrooms'])
                        ->setBathrooms($data['num_bathrooms'])
                        ->setPrice($data['price'])
                        ->setPropertyState($data['type'])
                        ->setPropertyType($data['property_type_id']);
                    $this->propertyRepository->save($property);
                }
                $this->messageManager->addSuccessMessage(__('Successfully synced with Api'));
            }
        } catch (Exception $exception) {
            $this->logger->error($exception->getMessage());
            $this->messageManager->addErrorMessage(__('Something went wrong'));
        }

        return $resultRedirect;
    }
}