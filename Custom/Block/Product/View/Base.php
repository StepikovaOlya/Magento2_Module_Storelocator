<?php
declare(strict_types=1);

namespace Stepikova\Custom\Block\Product\View;

class Base extends \Magento\Catalog\Block\Product\View
{
    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->getProduct()->getName();
    }
}
