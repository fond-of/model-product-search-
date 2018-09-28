<?php

namespace FondOfSpryker\Zed\ModelProductSearch\Dependency\Facade;

use Generated\Shared\Transfer\ModelCollectionTransfer;

class ModelProductSearchToProductListFacadeBridge implements ModelProductSearchToModelProductFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\ModelProduct\Business\ModelProductFacadeInterface
     */
    protected $modelProductFacade;

    /**
     * @param \FondOfSpryker\Zed\ModelProduct\Business\ModelProductFacadeInterface $modelProductFacade
     */
    public function __construct($modelProductFacade)
    {
        $this->modelProductFacade = $modelProductFacade;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\ModelCollectionTransfer
     */
    public function getModelsByProductAbstractId(int $idProductAbstract): ModelCollectionTransfer
    {
        return $this->modelProductFacade->getModelsByProductAbstractId($idProductAbstract);
    }
}
