<?php

namespace Stepikova\Custom\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\ScopeInterface;
use Stepikova\Custom\Model\Configuration;

/**
 * Class Store Label.
 */
class Label extends Template
{
    /**
     * @var \Stepikova\Custom\Model\Configuration
     */
    protected $_configuration;

    /**
     * @param Context $context
     * @param Configuration $configuration
     * @param array $data
     */
    public function __construct(
        Context $context,
        Configuration $configuration,
        array $data = []
    ) {
        $this->_configuration = $configuration;
        parent::__construct($context, $data);
    }

    /**
     * Show Store Label
     *
     * @return bool
     */
    public function showLabel(): bool
    {
        return $this->_scopeConfig->isSetFlag(
            Configuration::XML_PATH_EXTENSION_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get Store Label Text
     *
     * @return string|null
     */
    public function getLabel() : ? string
    {
        return $this->_scopeConfig->getValue(
            Configuration::XML_PATH_STORE_LABEL,
            ScopeInterface::SCOPE_STORE
        );
    }
}
