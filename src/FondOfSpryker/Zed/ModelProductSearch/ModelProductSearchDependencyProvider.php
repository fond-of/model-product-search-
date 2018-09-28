<?php

namespace FondOfSpryker\Zed\ModelProductSearch;

use FondOfSpryker\Zed\ModelProductSearch\Dependency\Facade\ModelProductSearchToProductListFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ModelProductSearchDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_MODEL_PRODUCT = 'FACADE_MODEL_PRODUCT';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);
        $container = $this->addModelProductFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addModelProductFacade(Container $container): Container
    {
        $container[static::FACADE_MODEL_PRODUCT] = function (Container $container) {
            return new ModelProductSearchToProductListFacadeBridge($container->getLocator()->modelProduct()->facade());
        };

        return $container;
    }
}
