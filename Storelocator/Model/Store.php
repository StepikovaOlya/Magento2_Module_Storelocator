<?php

namespace Stepikova\Storelocator\Model;

use Magento\Framework\Model\AbstractModel;
use Stepikova\Storelocator\Api\Data\StoreInterface;

/**
 * Store model
 */
class Store extends AbstractModel implements StoreInterface
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

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getStoreId(): ?int
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * Get Store Name
     *
     * @return string|null
     */
    public function getStoreName(): ?string
    {
        return $this->getData(self::STORE_NAME);
    }

    /**
     * Get Store Description
     *
     * @return string|null
     */
    public function getStoreDescription(): ?string
    {
        return $this->getData(self::STORE_DESCRIPTION);
    }

    /**
     * Get Store Image
     *
     * @return string|null
     */
    public function getStoreImage(): ?string
    {
        return $this->getData(self::STORE_IMAGE);
    }

    /**
     * Get Store Schedule
     *
     * @return string|null
     */
    public function getStoreSchedule(): ?string
    {
        return $this->getData(self::STORE_SCHEDULE);
    }

    /**
     * Get Store Latitude
     *
     * @return string|null
     */
    public function getStoreLatitude(): ?string
    {
        return $this->getData(self::STORE_LATITUDE);
    }

    /**
     * Get Store Longitude
     *
     * @return string|null
     */
    public function getStoreLongitude(): ?string
    {
        return $this->getData(self::STORE_LONGITUDE);
    }

    /**
     * Set ID
     *
     * @param int $storeId
     * @return StoreInterface
     */
    public function setStoreId(int $storeId): StoreInterface
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * Set Store Name
     *
     * @param string $storeName
     * @return StoreInterface
     */
    public function setStoreName(string $storeName): StoreInterface
    {
        return $this->setData(self::STORE_NAME, $storeName);
    }

    /**
     * @param string $storeDescription
     * @return StoreInterface
     */
    public function setStoreDescription(string $storeDescription): StoreInterface
    {
        return $this->setData(self::STORE_DESCRIPTION, $storeDescription);
    }

    /**
     * @param string $storeSchedule
     * @return StoreInterface
     */
    public function setStoreSchedule(string $storeSchedule): StoreInterface
    {
        return $this->setData(self::STORE_SCHEDULE, $storeSchedule);
    }

    /**
     * @param string $storeImage
     * @return StoreInterface
     */
    public function setStoreImage(string $storeImage): StoreInterface
    {
        return $this->setData(self::STORE_IMAGE, $storeImage);
    }

    /**
     * @param $storeLatitude
     * @return StoreInterface
     */
    public function setStoreLatitude($storeLatitude): StoreInterface
    {
        return $this->setData(self::STORE_LATITUDE, $storeLatitude);
    }

    /**
     * @param $storeLongitude
     * @return StoreInterface
     */
    public function setStoreLongitude($storeLongitude): StoreInterface
    {
        return $this->setData(self::STORE_LONGITUDE, $storeLongitude);
    }
}
