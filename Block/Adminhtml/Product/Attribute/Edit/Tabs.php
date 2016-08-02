<?php

namespace Dmatthew\AttributeDescription\Block\Adminhtml\Product\Attribute\Edit;

class Tabs extends \Magento\Catalog\Block\Adminhtml\Product\Attribute\Edit\Tabs
{
    protected function _beforeToHtml()
    {
        $this->addTab(
            'descriptions',
            [
                'label' => __('Manage Descriptions'),
                'title' => __('Manage Descriptions'),
                'content' => $this->getChildHtml('descriptions'),
                'after' => 'labels'
            ]
        );

        return parent::_beforeToHtml();
    }
}