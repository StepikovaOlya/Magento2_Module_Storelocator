<?php

declare(strict_types=1);

namespace Stepikova\Storelocator\Api\Data;

interface StoreInterface
{
    public const STORE_ID = 'store_id';

    public const STORE_NAME = 'store_name';

    public const STORE_DESCRIPTION = 'store_description';

    public const STORE_IMAGE = 'store_image';

    public const STORE_SCHEDULE = 'store_schedule';

    public const STORE_LATITUDE = 'store_latitude';

    public const STORE_LONGITUDE = 'store_longitude';

    /**
     * @return int
     */
    public function getStoreId(): int;

    /**
     * @param int $storeId
     * @return $this
     */
    public function setStoreId(int $storeId): self;

    /**
     * @return string
     */
    public function getStoreName(): string;

    /**
     * @param string $storeName
     * @return $this
     */
    public function setStoreName(string $storeName): self;

    /**
     * @return string
     */
    public function getStoreDescription(): string;

    /**
     * @param string $storeDescription
     * @return $this
     */
    public function setStoreDescription(string $storeDescription): self;

    /**
     * @return string
     */
    public function getStoreImage(): string;

    /**
     * @param string $storeImage
     * @return $this
     */
    public function setStoreImage(string $storeImage): self;

    /**
     * @return string
     */
    public function getStoreSchedule(): string;

    /**
     * @param string $storeSchedule
     * @return $this
     */
    public function setStoreSchedule(string $storeSchedule): self;

    /**
     * @return string
     */
    public function getStoreLatitude(): string;

    /**
     * @param string $storeLatitude
     * @return $this
     */
    public function setStoreLatitude(string $storeLatitude): self;

    /**
     * @return string
     */
    public function getStoreLongitude(): string;

    /**
     * @param string $storeLongitude
     * @return $this
     */
    public function setStoreLongitude(string $storeLongitude): self;

}
