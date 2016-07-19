<?php

namespace Dmatthew\AttributeDescription\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'eav_attribute_description'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('eav_attribute_description')
        )->addColumn(
            'attribute_description_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Attribute description Id'
        )->addColumn(
            'attribute_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true, 'nullable' => false, 'default' => '0'],
            'Attribute Id'
        )->addColumn(
            'store_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true, 'nullable' => false, 'default' => '0'],
            'Store Id'
        )->addColumn(
            'value',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            ['nullable' => true, 'default' => null],
            'Value'
        )->addIndex(
            $installer->getIdxName('eav_attribute_description', ['store_id']),
            ['store_id']
        )->addIndex(
            $installer->getIdxName('eav_attribute_description', ['attribute_id', 'store_id']),
            ['attribute_id', 'store_id']
        )->addForeignKey(
            $installer->getFkName('eav_attribute_description', 'attribute_id', 'eav_attribute', 'attribute_id'),
            'attribute_id',
            $installer->getTable('eav_attribute'),
            'attribute_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName('eav_attribute_description', 'store_id', 'store', 'store_id'),
            'store_id',
            $installer->getTable('store'),
            'store_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->setComment(
            'Eav Attribute Description'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}