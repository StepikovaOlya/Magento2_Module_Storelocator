<?php

declare(strict_types=1);

namespace Stepikova\Storelocator\Model;

use Stepikova\Storelocator\Api\Data\StoreInterface;
use function _PHPStan_76800bfb5\RingCentral\Psr7\str;

class StoreData extends \Magento\Framework\Api\AbstractSimpleObject implements
    \Stepikova\Storelocator\Api\Data\StoreInterface
{
    /**
     * @inheritDoc
     */
    public function getStoreId(): int
    {
        return (int) $this->_get(StoreInterface::STORE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setStoreId(int $storeId): StoreInterface
    {
        $this->setData(self::STORE_ID, $storeId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStoreName(): string
    {
        return (string) $this->_get(StoreInterface::STORE_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setStoreName(string $storeName): StoreInterface
    {
        $this->setData(self::STORE_NAME, $storeName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStoreDescription(): string
    {
        return (string) $this->_get(StoreInterface::STORE_DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setStoreDescription(string $storeDescription): StoreInterface
    {
        $this->setData(self::STORE_DESCRIPTION, $storeDescription);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStoreImage(): string
    {
        return (string) $this->_get(StoreInterface::STORE_IMAGE);
    }

    /**
     * @inheritDoc
     */
    public function setStoreImage(string $storeImage): StoreInterface
    {
        $this->setData(self::STORE_IMAGE, $storeImage);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStoreSchedule(): string
    {
        return (string) $this->_get(StoreInterface::STORE_SCHEDULE);
    }

    /**
     * @inheritDoc
     */
    public function setStoreSchedule(string $storeSchedule): StoreInterface
    {
        $this->setData(self::STORE_SCHEDULE, $storeSchedule);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStoreLatitude(): string
    {
        return (string) $this->_get(StoreInterface::STORE_LATITUDE);
    }

    /**
     * @inheritDoc
     */
    public function setStoreLatitude(string $storeLatitude): StoreInterface
    {
        $this->setData(self::STORE_LATITUDE, $storeLatitude);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStoreLongitude(): string
    {
        return (string) $this->_get(StoreInterface::STORE_LONGITUDE);
    }

    /**
     * @inheritDoc
     */
    public function setStoreLongitude(string $storeLongitude): StoreInterface
    {
        $this->setData(self::STORE_LONGITUDE, $storeLongitude);

        return $this;
    }
}
