<?php

namespace Dmatthew\AttributeDescription\Model\ResourceModel\Entity;

class Attribute extends \Magento\Catalog\Model\ResourceModel\Attribute
{
    /**
     * Retrieve store descriptions by given attribute id
     *
     * @param int $attributeId
     * @return array
     */
    public function getStoreDescriptionsByAttributeId($attributeId)
    {
        $connection = $this->getConnection();
        $bind = [':attribute_id' => $attributeId];
        $select = $connection->select()->from(
            $this->getTable('eav_attribute_description'),
            ['store_id', 'value']
        )->where(
            'attribute_id = :attribute_id'
        );

        return $connection->fetchPairs($select, $bind);
    }
}