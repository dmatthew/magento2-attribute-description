<?php

namespace Dmatthew\AttributeDescription\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Eav\Model\ResourceModel\Entity\Attribute;

class CatalogAttributeSaveAfterObserver implements ObserverInterface
{
    /**
     * @var Attribute
     */
    protected $_resource;

    public function __construct(Attribute $attribute)
    {
        $this->_resource = $attribute;
    }

    /**
     * After save attribute, save attribute description to eav_attribute_description table.
     *
     * @param EventObserver $observer
     * @return $this
     */
    public function execute(EventObserver $observer)
    {
        $attribute = $observer->getEvent()->getAttribute();
        $storeDescriptions = $attribute->getFrontendDescription();
        if (is_array($storeDescriptions)) {
            $connection = $this->_resource->getConnection();
            if ($attribute->getId()) {
                $condition = ['attribute_id =?' => $attribute->getId()];
                $connection->delete($this->_resource->getTable('eav_attribute_description'), $condition);
            }
            foreach ($storeDescriptions as $storeId => $description) {
                if ($storeId == 0 || !strlen($description)) {
                    continue;
                }
                $bind = ['attribute_id' => $attribute->getId(), 'store_id' => $storeId, 'value' => $description];
                $connection->insert($this->_resource->getTable('eav_attribute_description'), $bind);
            }
        }
        return $this;
    }
}
