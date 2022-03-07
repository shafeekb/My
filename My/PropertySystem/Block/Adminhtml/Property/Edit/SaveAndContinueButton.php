<?php

namespace My\PropertySystem\Block\Adminhtml\Property\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveAndContinueButton
 *
 * @package My\PropertySystem\Block\Adminhtml\Property\Edit
 */
class SaveAndContinueButton implements ButtonProviderInterface
{
    /**
     * Save and Continue Button
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label'          => __('Save and Continue Edit'),
            'class'          => 'save',
            'data_attribute' => [
                'mage-init' => [
                    'button' => ['event' => 'saveAndContinueEdit'],
                ],
            ],
            'sort_order'     => 80,
        ];
    }
}