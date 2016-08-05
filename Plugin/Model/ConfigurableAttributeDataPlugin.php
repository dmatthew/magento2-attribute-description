<?php

namespace Dmatthew\AttributeDescription\Plugin\Model;

use Magento\Catalog\Model\Product;

class ConfigurableAttributeDataPlugin
{
    public function aroundGetAttributesData(
        \Magento\ConfigurableProduct\Model\ConfigurableAttributeData $subject,
        \Closure $proceed,
        Product $product,
        array $options = []
    ) {
        $result = $proceed($product, $options);

        foreach ($product->getTypeInstance()->getConfigurableAttributes($product) as $attribute) {
            $productAttribute = $attribute->getProductAttribute();
            $attributeId = $productAttribute->getId();
            if (isset($result['attributes'][$attributeId])) {
                $result['attributes'][$attributeId]['description'] = $attribute->getDescription();
            }
        }

        return $result;
    }
}