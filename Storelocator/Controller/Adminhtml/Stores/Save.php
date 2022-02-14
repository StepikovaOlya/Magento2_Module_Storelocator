<?php

namespace Stepikova\Storelocator\Controller\Adminhtml\Stores;

use Stepikova\Storelocator\Api\StoreRepositoryInterface;
use Stepikova\Storelocator\Model\StoreFactory;
use Stepikova\Storelocator\Controller\Adminhtml\Stores\Store as StoreAlias;
use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Save extends StoreAlias implements HttpGetActionInterface, HttpPostActionInterface
{
    /**
     * @var  StoreRepositoryInterface
     */
    private $storeRepository;
    /**
     * @var StoreFactory
     */
    private $storeFactory;
    /**
     * @var RedirectFactory
     */
    private $redirectFactory;

    /**
     * Save constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param StoreRepositoryInterface $storeRepository
     * @param StoreFactory $storeFactory
     * @param RedirectFactory $redirectFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        StoreRepositoryInterface $storeRepository,
        StoreFactory $storeFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context, $coreRegistry);
        $this->storeRepository = $storeRepository;
        $this->storeFactory = $storeFactory;
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        $storeData = $this->getRequest()->getParams();

        $store = $this->storeFactory->create();

        $store->setData($storeData);

        if(!$store->getData("store_id")) {
            $store->unsetData("store_id");
        }

        $this->storeRepository->save($store);

        return $this->redirectFactory->create()->setPath("*/*/index");
    }
}
