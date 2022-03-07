<?php

namespace My\PropertySystem\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class Data
 *
 * @package My\PropertySystem\Helper
 */
class Data extends AbstractHelper
{
    /**
     * Property system api url config path
     */
    const PROPERTY_SYSTEM_API_URL_CONFIG_PATH = 'property_system/setting/api_url';

    /**
     * Property system api key config path
     */
    const PROPERTY_SYSTEM_API_KEY_CONFIG_PATH = 'property_system/setting/api_key';

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->storeManager = $storeManager;
    }

    public function getApiUrl()
    {
        return $this->getConfigValue(self::PROPERTY_SYSTEM_API_URL_CONFIG_PATH);
    }

    public function getApiKey()
    {
        return $this->getConfigValue(self::PROPERTY_SYSTEM_KEY_URL_CONFIG_PATH);
    }

    /**
     * Get config value
     *
     * @param $configValue
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getConfigValue($configValue)
    {
        return $this->scopeConfig->getValue($configValue, ScopeInterface::SCOPE_STORE, $this->getStoreId());
    }

    /**
     * Get current store id
     *
     * @return int
     * @throws NoSuchEntityException
     */
    public function getStoreId(): int
    {
        return $this->storeManager->getStore()->getId();
    }
}