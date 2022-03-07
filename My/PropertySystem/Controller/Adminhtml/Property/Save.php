<?php
/**
 * Save.php
 *
 * @package     PhpStorm
 * @author      shafeek.b@unic.com
 * @copyright   Copyright (c) 2022 Unic AG (http://www.unic.com)
 * @category    exampleproject
 */

namespace My\PropertySystem\Controller\Adminhtml\Property;

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use My\PropertySystem\Api\Data\PropertyInterface;
use My\PropertySystem\Api\PropertyRepositoryInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Save
 *
 * @package My\PropertySystem\Controller\Adminhtml\Property
 */
class Save extends Action
{

    /**
     * @var PropertyInterface
     */
    protected $property;

    /**
     * @var PropertyRepositoryInterface
     */
    protected $propertyRepository;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Save constructor
     *
     * @param Context $context
     * @param PropertyInterface $property
     * @param PropertyRepositoryInterface $propertyRepository
     * @param LoggerInterface $logger
     * @return void
     */
    public function __construct(
        Context $context,
        PropertyInterface $property,
        PropertyRepositoryInterface $propertyRepository,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->property = $property;
        $this->propertyRepository = $propertyRepository;
        $this->logger = $logger;
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResponseInterface
     */
    public function execute()
    {
        try {
            $data = $this->getRequest()->getPostValue();
            if (!$data) {
                throw new Exception(__('Empty data'));
            }
            $this->propertyRepository->save($this->property->setData($data));
            if ($this->getRequest()->getParam('back')) {
                //redirect to edit page
                return $this->_redirect(
                    '*/*/edit',
                    ['id' => $this->property->getEntityId(), '_current' => true]
                );
            }

            return $this->_redirect('*/*/index');
        } catch (Exception $exception) {
            $this->logger->error($exception->getMessage());
            $this->messageManager->addErrorMessage(__('Something went wrong'));
        }

        return $this->_redirect('*/*/edit');
    }
}