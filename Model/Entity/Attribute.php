<?php

namespace Dmatthew\AttributeDescription\Model\Entity;

class Attribute extends \Magento\Catalog\Model\ResourceModel\Eav\Attribute
{
    /**
     * Return array of descriptions for stores.
     *
     * @return string[]
     */
    public function getStoreDescriptions()
    {
        if (!$this->getData('store_descriptions')) {
            $storeDescription = $this->getResource()->getStoreDescriptionsByAttributeId($this->getId());
            $this->setData('store_descriptions', $storeDescription);
        }
        return $this->getData('store_descriptions');
    }

    /**
     * Return store description of attribute.
     *
     * @param int|null $storeId
     * @return string
     */
    public function getStoreDescription($storeId = null)
    {
        if ($this->hasData('store_description')) {
            return $this->getData('store_description');
        }
        $store = $this->_storeManager->getStore($storeId);
        $descriptions = $this->getStoreDescriptions();
        if (isset($descriptions[$store->getId()])) {
            return $descriptions[$store->getId()];
        } else {
            return $this->getFrontendDescription();
        }
    }
}