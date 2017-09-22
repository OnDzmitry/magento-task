<?php
$installer = $this;
$installer->startSetup();

$installer->run("
ALTER TABLE `{$this->getTable('sales/order')}` ADD `insurance_amount` DECIMAL( 12, 4 ) NOT NULL;
ALTER TABLE `{$this->getTable('sales/order')}` ADD `base_insurance_amount` DECIMAL( 12, 4 ) NOT NULL;");

$installer->endSetup();