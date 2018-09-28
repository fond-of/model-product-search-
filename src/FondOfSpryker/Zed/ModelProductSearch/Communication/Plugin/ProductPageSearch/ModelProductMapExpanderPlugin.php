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
    protected const KEY_MODEL = 'model';

    /**
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
        if (isset($productData[static::KEY_MODEL])) {
            $pageMapTransfer->setModel($productData[static::KEY_MODEL]);
        }

        return $pageMapTransfer;
    }
}
