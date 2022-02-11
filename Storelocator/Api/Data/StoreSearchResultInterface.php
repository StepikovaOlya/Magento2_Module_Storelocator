<?php

declare(strict_types=1);

namespace Stepikova\Storelocator\Api\Data;

/**
 * Must redefine the interface methods for \Magento\Framework\Reflection\DataObjectProcessor::buildOutputDataArray()
 * Must not declare return types to keep the interface consistent with the parent interface
 */
interface StoreSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * @return \Stepikova\Storelocator\Api\Data\StoreInterface[]
     */
    public function getItems();

    /**
     * Set items list.
     *
     * @param \Stepikova\Storelocator\Api\Data\StoreInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null);
}
