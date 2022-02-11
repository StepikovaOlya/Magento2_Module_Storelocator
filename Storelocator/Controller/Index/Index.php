<?php
declare(strict_types=1);

namespace Stepikova\Storelocator\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;

class Index extends \Magento\Framework\App\Action\Action implements
    \Magento\Framework\App\Action\HttpGetActionInterface
{
    /**
     * @inheritDoc
     * https://magento24.devsite/store
     */
    public function execute()
    {
        /** @var Page $response */
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
