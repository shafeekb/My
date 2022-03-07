<?php
/**
 * BackButton.php
 *
 * @package     PhpStorm
 * @author      shafeek.b@unic.com
 * @copyright   Copyright (c) 2022 Unic AG (http://www.unic.com)
 * @category    exampleproject
 */

namespace Shafeekb\PropertySystem\Block\Adminhtml\Property\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class BackButton
 *
 * @package Shafeekb\PropertySystem\Block\Adminhtml\Property\Edit
 */
class BackButton implements ButtonProviderInterface
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * BackButton constructor
     *
     * @param Context $context
     * @return void
     */
    public function __construct(Context $context)
    {
        $this->urlBuilder = $context->getUrlBuilder();
    }

    /**
     * Back Button
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label'      => __('Back'),
            'on_click'   => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class'      => 'back',
            'sort_order' => 10,
        ];
    }

    /**
     * Get URL for back button
     *
     * @return string
     */
    public function getBackUrl(): string
    {
        return $this->getUrl('*/*/');
    }

    /**
     * Build url.
     *
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}