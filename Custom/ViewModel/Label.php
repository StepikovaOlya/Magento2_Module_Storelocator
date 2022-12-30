<?php

declare(strict_types=1);

namespace Stepikova\Custom\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

class Label implements ArgumentInterface
{
    /**
     * Extension enabled config path
     */
    const XML_PATH_EXTENSION_ENABLED = 'steplabel/general/enabled';

    /**
     * Product Label Text
     */
    const XML_PATH_STORE_LABEL = 'steplabel/general/store_label';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $scopeConfig
     */

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }
    /**
     * Show Store Label
     *
     * @return bool
     */
    public function showLabel(): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_EXTENSION_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /** Get Store Label Text
     *
     * @return string
     */
    public function getLabel(): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_PATH_STORE_LABEL,
            ScopeInterface::SCOPE_STORE
        );
    }
}
