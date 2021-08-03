<?php

namespace FondOfSpryker\Zed\ModelProductSearch\Communication\Plugin\ProductPageSearch;

use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageDataExpanderInterface;

/**
 * @method \FondOfSpryker\Zed\ModelProductSearch\Communication\ModelProductSearchCommunicationFactory getFactory()
 */
class ModelProductDataExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderInterface
{
    /**
     * @api
     *
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     *
     * @return void
     */
    public function expandProductPageData(array $productData, ProductPageSearchTransfer $productAbstractPageSearchTransfer): void
    {
        $attributes = json_decode($productData['attributes'], true);
        if (array_key_exists('model', $attributes)) {
            $productAbstractPageSearchTransfer->setModel($attributes['model']);
        }
    }
}
