<?php
/**
 * Edit.php
 *
 * @package     PhpStorm
 * @author      shafeek.b@unic.com
 * @copyright   Copyright (c) 2022 Unic AG (http://www.unic.com)
 * @category    exampleproject
 */

namespace My\PropertySystem\Controller\Adminhtml\Property;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Edit
 *
 * @package My\PropertySystem\Controller\Adminhtml\Property
 */
class Edit extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * Edit constructor
     *
     * @param Context $context
     * @param PageFactory $pageFactory
     * @return void
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResponseInterface|ResultInterface|Page
     */
    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('My_PropertySystem::property_system');
        $resultPage->getConfig()->getTitle()->prepend(__('Property Edit Form'));

        return $resultPage;
    }
}