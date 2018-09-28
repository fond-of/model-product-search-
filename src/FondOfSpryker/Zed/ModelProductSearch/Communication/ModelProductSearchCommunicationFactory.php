<?php

namespace FondOfSpryker\Zed\ModelProductSearch\Communication;

use FondOfSpryker\Zed\ModelProductSearch\ModelProductSearchDependencyProvider;
use FondOfSpryker\Zed\ModelProductSearch\Dependency\Facade\ModelProductSearchToModelProductFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

/**
 * @method \FondOfSpryker\Zed\ModelProductSearch\ModelProductSearchConfig getConfig()
 */
class ModelProductSearchCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \FondOfSpryker\Zed\ModelProductSearch\Dependency\Facade\ModelProductSearchToModelProductFacadeInterface
     */
    public function getModelProductFacade(): ModelProductSearchToModelProductFacadeInterface
    {
        return $this->getProvidedDependency(ModelProductSearchDependencyProvider::FACADE_MODEL_PRODUCT);
    }
}
