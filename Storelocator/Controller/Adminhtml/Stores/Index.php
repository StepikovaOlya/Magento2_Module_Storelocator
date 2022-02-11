<?php

declare(strict_types=1);

namespace Stepikova\Storelocator\Controller\Adminhtml\Stores;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
    public const ADMIN_RESOURCE = 'Stepikova_Storelocator::storelist';

    /**
     * @inheritDoc
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
