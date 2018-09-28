<?php

namespace FondOfSpryker\Zed\ModelProductSearch\Communication\Plugin\ProductPageSearch;

use Generated\Shared\Transfer\ModelProductSearchTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageMapExpanderInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \FondOfSpryker\Zed\ModelProductSearch\Communication\ModelProductSearchCommunicationFactory getFactory()
 */
class ModelProductMapExpanderPlugin extends AbstractPlugin implements ProductPageMapExpanderInterface
{
    protected const KEY_PRODUCT_MODEL = 'product_models';

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandProductPageMap(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $localeTransfer): PageMapTransfer
    {
        if (!isset($productData[static::KEY_PRODUCT_MODEL])) {
            return $pageMapTransfer;
        }

        $transfer = $this->getModelProductSearchData($productData);
        $pageMapTransfer->setProductModels($transfer);

        return $pageMapTransfer;
    }

    /**
     * @param array $productData
     *
     * @return \Generated\Shared\Transfer\ModelProductSearchTransfer
     */
    protected function getModelProductSearchData(array $productData): ModelProductSearchTransfer
    {
        $transfer = new ModelProductSearchTransfer();
        $transfer->fromArray($productData[static::KEY_PRODUCT_MODEL]);

        return $transfer;
    }
}
