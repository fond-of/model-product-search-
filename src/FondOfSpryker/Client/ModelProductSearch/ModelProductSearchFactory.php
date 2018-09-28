<?php

namespace Spryker\Client\ModelProductSearch;

use Generated\Shared\Search\PageIndexMap;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Search\Model\Elasticsearch\Aggregation\AggregationBuilder;
use Spryker\Client\Search\Model\Elasticsearch\Aggregation\FacetAggregationFactory;
use Spryker\Client\Search\Model\Elasticsearch\AggregationExtractor\AggregationExtractorFactory;
use Spryker\Client\Search\Model\Elasticsearch\AggregationExtractor\FacetValueTransformerFactory;
use Spryker\Client\Search\Model\Elasticsearch\Query\QueryBuilder;
use Spryker\Client\Search\Model\Elasticsearch\Query\QueryFactory;
use Spryker\Client\Search\Model\Elasticsearch\Reader\Reader;
use Spryker\Client\Search\Model\Elasticsearch\Suggest\SuggestBuilder;
use Spryker\Client\Search\Model\Elasticsearch\Writer\Writer;
use Spryker\Client\Search\Model\Handler\ElasticsearchSearchHandler;
use Spryker\Client\Search\Plugin\Config\FacetConfigBuilder;
use Spryker\Client\Search\Plugin\Config\PaginationConfigBuilder;
use Spryker\Client\Search\Plugin\Config\SearchConfig;
use Spryker\Client\Search\Plugin\Config\SortConfigBuilder;
use Spryker\Client\Search\Plugin\Elasticsearch\Query\SearchKeysQuery;
use Spryker\Client\Search\Plugin\Elasticsearch\Query\SearchStringQuery;
use Spryker\Client\Search\Provider\IndexClientProvider;
use Spryker\Client\Search\Provider\SearchClientProvider;

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
