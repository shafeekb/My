<?php

namespace Shafeekb\PropertySystem\Controller\Adminhtml\Property;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 *
 * @package Shafeekb\PropertySystem\Controller\Adminhtml\Property
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * Index constructor
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
        $resultPage->setActiveMenu('Shafeekb_PropertySystem::property_system');
        $resultPage->getConfig()->getTitle()->prepend(__('Property System Grid'));

        return $resultPage;
    }
}