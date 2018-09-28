<?php

namespace FondOfSpryker\Zed\ModelProductSearch\Dependency\Facade;

use Generated\Shared\Transfer\ModelCollectionTransfer;

interface ModelProductSearchToModelProductFacadeInterface
{
    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\ModelCollectionTransfer
     */
    public function getModelsByProductAbstractId(int $idProductAbstract): ModelCollectionTransfer;
}
