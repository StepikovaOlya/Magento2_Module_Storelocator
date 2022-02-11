<?php

declare(strict_types=1);

namespace Stepikova\Storelocator\Api;

use Stepikova\Storelocator\Api\Data\StoreInterface;
use Stepikova\Storelocator\Api\Data\StoreSearchResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface StoreRepositoryInterface
{
    /**
     * Save store item
     *
     * @param StoreInterface $store
     * @return StoreInterface
     */
    public function save(StoreInterface $store): StoreInterface;

    /**
     * Get store by store_id
     *
     * @param int $storeId
     * @return StoreInterface
     */
    public function get(int $storeId): StoreInterface;

    /**
     * Get list of stores
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Stepikova\Storelocator\Api\Data\StoreSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): StoreSearchResultInterface;

    /**
     * Delete store object
     *
     * @param StoreInterface $store
     * @return bool
     */
    public function delete(StoreInterface $store): bool;

    /**
     * Delete store by store_id
     *
     * @param int $storeId
     * @return bool
     */
    public function deleteById(int $storeId): bool;
}
