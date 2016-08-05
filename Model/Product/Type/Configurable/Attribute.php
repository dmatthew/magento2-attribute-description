<?php

namespace Dmatthew\AttributeDescription\Model\Product\Type\Configurable;

class Attribute extends \Magento\ConfigurableProduct\Model\Product\Type\Configurable\Attribute
{
    const KEY_DESCRIPTION = 'description';

    /**
     * @return string|null
     */
    public function getDescription()
    {
        if ($this->getData('use_default') && $this->getProductAttribute()) {
            return $this->getProductAttribute()->getStoreDescription();
        } elseif ($this->getData(self::KEY_DESCRIPTION) === null && $this->getProductAttribute()) {
            $this->setData(self::KEY_DESCRIPTION, $this->getProductAttribute()->getStoreDescription());
        }

        return $this->getData(self::KEY_DESCRIPTION);
    }
}