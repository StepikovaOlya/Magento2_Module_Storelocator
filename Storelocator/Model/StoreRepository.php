<?php

declare(strict_types=1);

namespace Stepikova\Storelocator\Model;

use Stepikova\Storelocator\Api\Data\StoreSearchResultInterface;
use Stepikova\Storelocator\Api\Data\StoreInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;

class StoreRepository implements \Stepikova\Storelocator\Api\StoreRepositoryInterface
{
    /**
     * @var \Magento\Framework\EntityManager\EntityManager $entityManager
     */
    private $entityManager;

    /**
     * @var \Stepikova\Storelocator\Api\Data\StoreSearchResultInterfaceFactory $searchResultsFactory
     */
    private $searchResultsFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     **/
    private $collectionProcessor;

    /**
     * @var \Stepikova\Storelocator\Api\Data\StoreInterfaceFactory $storeDataFactory
     */
    private $storeDataFactory;

    /**
     * StoreRepository constructor.
     * @param \Magento\Framework\EntityManager\EntityManager $entityManager
     * @param \Stepikova\Storelocator\Model\ResourceModel\Store\CollectionFactory $storeCollectionFactory
     * @param \Stepikova\Storelocator\Api\Data\StoreSearchResultInterfaceFactory $searchResultsFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     * @param \Stepikova\Storelocator\Api\Data\StoreInterfaceFactory $storeDataFactory
     */
    public function __construct(
        \Magento\Framework\EntityManager\EntityManager $entityManager,
        \Stepikova\Storelocator\Model\ResourceModel\Store\CollectionFactory $storeCollectionFactory,
        \Stepikova\Storelocator\Api\Data\StoreSearchResultInterfaceFactory $searchResultsFactory,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        \Stepikova\Storelocator\Api\Data\StoreInterfaceFactory $storeDataFactory
    ) {
        $this->entityManager = $entityManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->storeCollectionFactory = $storeCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->storeDataFactory = $storeDataFactory;
    }

    /**
     * @inheritDoc
     * @throws CouldNotSaveException
     */
    public function save(StoreInterface $store): StoreInterface
    {
        try {
            $this->entityManager->save($store);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $store;
    }

    /**
     * @inheritdoc
     */
    public function getById(int $storeId): StoreInterface
    {
        $storeItem = $this->storeDataFactory->create();

        return $this->entityManager->load($storeItem, $storeId);
    }

    /**
     * @inheritdoc
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria): StoreSearchResultInterface
    {
        $storeCollection = $this->storeCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $storeCollection);
        $stores = [];

        /** @var Store $store */
        foreach ($storeCollection as $store) {
            $data = $store->getData();
            $data['store_id'] = $store->getStoreId();
            $stores[] = $this->storeDataFactory->create(['data' => $data]);
        }

        /** @var StoreSearchResultInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setTotalCount($storeCollection->getSize());
        $searchResults->setItems($stores);

        return $searchResults;
    }

    /**
     * @inheritdoc
     */
    public function delete(StoreInterface $store): bool
    {
        try {
            $this->entityManager->delete($store);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function deleteById(int $storeId): bool
    {
        return $this->delete($this->getById($storeId));
    }
}
