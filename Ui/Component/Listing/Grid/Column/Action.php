<?php

namespace Shafeekb\PropertySystem\Ui\Component\Listing\Grid\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Shafeekb\PropertySystem\Api\Data\PropertyInterface;

/**
 * Class Action
 *
 * @package Shafeekb\PropertySystem\Ui\Component\Listing\Grid\Column
 */
class Action extends Column
{
    /**
     * @var UrlInterface
     */
    protected $_urlBuilder;

    /**
     * Action constructor.
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     * @return void
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source.
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item[PropertyInterface::ENTITY_ID])) {
                    $item[$name]['edit'] = [
                        'href'  => $this->_urlBuilder->getUrl(
                            'property/property/edit',
                            ['id' => $item[PropertyInterface::ENTITY_ID]]
                        ),
                        'label' => __('Edit'),
                    ];
                }
            }
        }

        return $dataSource;
    }
}
