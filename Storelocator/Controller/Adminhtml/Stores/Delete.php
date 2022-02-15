<?php

declare(strict_types=1);

namespace Stepikova\Storelocator\Controller\Adminhtml\Stores;

use Stepikova\Storelocator\Api\StoreRepositoryInterface;
use Stepikova\Storelocator\Controller\Adminhtml\Stores\Store as StoreAlias;
use Magento\Backend\App\Action;
use Magento\Framework\Registry;

/**
 * Class Delete
 * @package Stepikova\Storelocator\Controller\Adminhtml\Stores
 */
class Delete extends StoreAlias
{
    /**
     * @var StoreRepositoryInterface
     */
    protected StoreRepositoryInterface $storeRepositoryInterface;

    /**
     * Delete constructor.
     * @param Action\Context $context
     * @param Registry $coreRegistry
     * @param StoreRepositoryInterface $storeRepository
     */
    public function __construct(
        Action\Context $context,
        Registry $coreRegistry,
        StoreRepositoryInterface $storeRepository
    ) {
        parent::__construct($context, $coreRegistry);
        $this->storeRepositoryInterface = $storeRepository;
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute(): \Magento\Framework\Controller\ResultInterface
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('store_id');
        if ($id) {
            try {
                // init model and delete
                $this->storeRepositoryInterface->deleteById($id);
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the store.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/', ['store_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a store to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
