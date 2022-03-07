<?php
/**
 * SaveButton.php
 *
 * @package     PhpStorm
 * @author      shafeek.b@unic.com
 * @copyright   Copyright (c) 2022 Unic AG (http://www.unic.com)
 * @category    exampleproject
 */

namespace Shafeekb\PropertySystem\Block\Adminhtml\Property\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton implements ButtonProviderInterface
{

    /**
     * Save Button
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label'          => __('Save'),
            'class'          => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'property_property_grid.property_property_grid',
                                'actionName' => 'save',
                                'params'     => [
                                    true,
                                    [
                                        'back' => 'continue',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}