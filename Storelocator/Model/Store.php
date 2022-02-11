<?php

namespace Stepikova\Storelocator\Model;

/**
 * Store model
 *
 * @method \Stepikova\Storelocator\Model\ResourceModel\Store _getResource()
 * @method \Stepikova\Storelocator\Model\ResourceModel\Store getResource()
 * @method int getStoreId()
 * @method $this setStoreId(int $value)
 * @method string getStoreName()
 * @method $this setStoreName(string $value)
 * @method string getStoreDescription()
 * @method $this setStoreDescription(string $value)
 * @method string getStoreImage()
 * @method $this setStoreImage(string $value)
 * @method string getStoreSchedule()
 * @method $this setStoreSchedule(string $value)
 * @method string getStoreLatitude()
 * @method $this setStoreLatitude(string $value)
 * @method string getStoreLongitude()
 * @method $this setContentStoreLongitude(string $value)
 */
class Store extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Stepikova\Storelocator\Model\ResourceModel\Store');
    }
}
