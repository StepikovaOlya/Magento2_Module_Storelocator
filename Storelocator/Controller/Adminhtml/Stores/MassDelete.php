<?php

declare(strict_types=1);

namespace Stepikova\Storelocator\Controller\Adminhtml\Stores;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Ui\Component\MassAction\Filter;
use Stepikova\Storelocator\Api\StoreRepositoryInterface;
use Stepikova\Storelocator\Model\ResourceModel\Store\CollectionFactory;
use Stepikova\Storelocator\Controller\Adminhtml\Stores\Store as StoreAlias;

/**
 * Class MassDelete
 * @package Stepikova\Storelocator\Controller\Adminhtml\Store
 *
 */
class MassDelete extends StoreAlias implements HttpPostActionInterface
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var StoreRepositoryInterface
     */
    protected $storeRepositoryInterface;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param StoreRepositoryInterface $storeRepository
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        Filter $filter,
        CollectionFactory $collectionFactory,
        StoreRepositoryInterface $storeRepository
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->storeRepositoryInterface = $storeRepository;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Execute action
     *
     * @return Redirect
     * @throws LocalizedException|\Exception
     */
    public function execute(): Redirect
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();

        foreach ($collection as $store) {
            $this->storeRepositoryInterface->delete($store);
        }

        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('*/*/');
    }
}
