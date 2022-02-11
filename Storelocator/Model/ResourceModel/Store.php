<?php

namespace Stepikova\Storelocator\Model\ResourceModel;

/**
 * Store resource model
 */
class Store extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('stepikova_storelocator', 'store_id');
    }
}
