<?php

namespace FondOfSpryker\Zed\ModelProductSearch\Communication\Plugin\ProductPageSearch;

use Generated\Shared\Transfer\ModelCollectionTransfer;
use Generated\Shared\Transfer\ModelProductSearchTransfer;
use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageDataExpanderInterface;

/**
 * @method \FondOfSpryker\Zed\ModelProductSearch\Communication\ModelProductSearchCommunicationFactory getFactory()
 */
class ModelProductDataExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderInterface
{
    protected const KEY_FK_PRODUCT_ABSTRACT = 'fk_product_abstract';

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     *
     * @return void
     */
    public function expandProductPageData(array $productData, ProductPageSearchTransfer $productAbstractPageSearchTransfer): void
    {
        $idProductAbstract = $this->getIdProductAbstract($productData);
        $modelsCollection = $this->getFactory()->getModelProductFacade()->getModelsByProductAbstractId($idProductAbstract);

        $modelNames = $this->getModelNames($modelsCollection);

        $names = new ModelProductSearchTransfer();
        $names->setNames($modelNames);

        $productAbstractPageSearchTransfer->setProductModels($names);
    }

    /**
     * Get model names
     *
     * @param \Generated\Shared\Transfer\ModelCollectionTransfer $modelsCollection
     *
     * @return array
     */
    protected function getModelNames(ModelCollectionTransfer $modelsCollection): array
    {
        $names = [];

        foreach ($modelsCollection->getModels() as $modelTransfer) {
            /** @var \Generated\Shared\Transfer\ModelTransfer $modelTransfer */
            $names[] = $modelTransfer->getName();
        }

        return $names;
    }

    /**
     * @param array $productData
     *
     * @return int
     */
    protected function getIdProductAbstract(array $productData): int
    {
        return $productData[static::KEY_FK_PRODUCT_ABSTRACT];
    }
}
