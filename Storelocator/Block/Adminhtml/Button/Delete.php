<?php

namespace Stepikova\Storelocator\Block\Adminhtml\Button;

use Magento\Backend\App\Action\Context;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete implements ButtonProviderInterface
{
    /**
     * @var Context
     */
    private $context;
    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * Save constructor.
     * @param Context $context
     * @param UrlInterface $url
     */
    public function __construct(
        Context $context,
        UrlInterface $url
    )
    {

        $this->context = $context;
        $this->url = $url;
    }

    public function getButtonData()
    {
        $data = [];
        if ($this->getStoreId()) {
            $data = [
                'label' => __('Delete Store'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure you want to do this?'
                    ) . '\', \'' . $this->getDeleteUrl() . '\', {"data": {}})',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    private function getStoreId()
    {
        return $this->context->getRequest()->getParam("store_id");
    }

    private function getDeleteUrl()
    {
        return $this->url->getUrl("*/*/delete", ["store_id" => $this->getStoreId()]);
    }
}
