<?php

namespace Stepikova\Storelocator\Model\ResourceModel\Store;

/**
 * Store collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Constructor
     * Configures collection
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(
            'Stepikova\Storelocator\Model\Store',
            'Stepikova\Storelocator\Model\ResourceModel\Store'
        );
    }

}
