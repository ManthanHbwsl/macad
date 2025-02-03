<?php
namespace Mageplaza\HelloWorld\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        if (!$installer->tableExists('custom_data_table')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('custom_data_table')
            )
            ->addColumn(
                'custom_data_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Custom Data ID'
            )
            // Add other columns as necessary
            ->setComment('Custom Data Table');
            
            $installer->getConnection()->createTable($table);
        }

        $installer->endSetup();
    }
}
