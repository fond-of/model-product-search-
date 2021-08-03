<?php

namespace  FondOfSpryker\Client\ModelProductSearch;

use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Search\Model\Elasticsearch\Query\QueryBuilder;

class ModelProductSearchFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Client\Search\Model\Elasticsearch\Query\QueryBuilderInterface
     */
    public function createQueryBuilder()
    {
        return new QueryBuilder();
    }
}
