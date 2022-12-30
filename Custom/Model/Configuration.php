<?php declare(strict_types=1);

namespace Stepikova\Custom\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Configuration
{
    /**
     * Extension enabled config path
     */
    const XML_PATH_EXTENSION_ENABLED = 'steplabel/general/enabled';

    /**
     * Store Label Text
     */
    const XML_PATH_STORE_LABEL = 'steplabel/general/store_label';

    protected ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }
}
