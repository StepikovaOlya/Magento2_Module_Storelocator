<?php

declare(strict_types=1);

namespace Stepikova\Storelocator\Ui\Component\Listing\Column;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Escaper;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class Actions
 * @package Stepikova\Storelocator\Ui\Component\Listing\Column
 */
class Actions extends Column
{
    /**
     * Url path
     */
    const URL_PATH_EDIT = 'stepikova_storelocator/stores/edit';
    const URL_PATH_DELETE = 'stepikova_storelocator/stores/delete';

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var Escaper
     */
    private $escaper;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @inheritDoc
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['store_id'])) {
                    $title = $this->getEscaper()->escapeHtmlAttr($item['store_name']);
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'store_id' => $item['store_id'],
                                ]
                            ),
                            'label' => __('Edit'),
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'store_id' => $item['store_id'],
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete %1', $title),
                                'message' => __('Are you sure you want to delete a %1 record?', $title),
                            ],
                            'post' => true,
                        ],
                    ];
                }
            }
        }

        return $dataSource;
    }

    /**
     * Get instance of escaper
     *
     * @return Escaper
     * @deprecated 101.0.7
     */
    private function getEscaper()
    {
        if (!$this->escaper) {
            $this->escaper = ObjectManager::getInstance()->get(Escaper::class);
        }
        return $this->escaper;
    }
}
