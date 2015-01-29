<?php

namespace TheIconic\Tracking\GoogleAnalytics\Parameters\EnhancedEcommerce;

use TheIconic\Tracking\GoogleAnalytics\Parameters\CompoundParameter;

/**
 * Class ProductImpression
 *
 * Represents the product impression to be added to the google analytics hit.
 *
 * @link https://developers.google.com/analytics/devguides/collection/protocol/v1/parameters#enhanced-ecomm
 *
 * @package TheIconic\Tracking\GoogleAnalytics\Parameters\EnhancedEcommerce
 */
class ProductImpression extends CompoundParameter
{
    /**
     * Key/value pair associative array that maches product fields with google analytics parameter name.
     *
     * @var array
     */
    protected $parameterNameMapper = [
        '/^sku$/' => 'id',
        '/^name$/' => 'nm',
        '/^brand$/' => 'br',
        '/^category$/' => 'ca',
        '/^variant$/' => 'va',
        '/^price$/' => 'pr',
        '/^position$/' => 'ps',
        '/^custom_dimension_(\d{1,3})$/' => 'cd',
        '/^custom_metric_(\d{1,3})$/' => 'cm',
    ];

    /**
     * Validates the product impression. SKU and name are required.
     * Translates and saves the product fields to be sent later in case they are valid.
     *
     * @throws \InvalidArgumentException
     *
     * @param array $productData
     */
    public function __construct(array $productData)
    {
        if (empty($productData['sku']) && empty($productData['name'])) {
            throw new \InvalidArgumentException('Either SKU or Name must be set for a product impression');
        }

        $this->saveCompoundParameterData($productData);
    }
}