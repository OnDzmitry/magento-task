<?php
/**
 * Created by PhpStorm.
 * User: d2.kozlovsky
 * Date: 28.9.17
 * Time: 12.50
 */

class Kdv_Insurance_Block_Checkout_Carriers extends Mage_Core_Block_Template
{
    private $config;

    public function __construct(array $args = array())
    {
        $this->config = $config = Mage::getConfig();
        parent::__construct($args);
    }

    public function getAvailableCarriersJSON()
    {
        $allActiveCarriers = Mage::getSingleton('shipping/config')->getActiveCarriers();
        $carriersPath = Mage::helper('insurance')->getConfigInsurancePath();
        $insuranceActiveCarriers = [];
        foreach ($allActiveCarriers as $carrier => $model) {
            $insurancePrice = Mage::helper('insurance')->getInsurancePrice($carrier);
            $enabled = array_shift($this->config->getStoresConfigByPath($carriersPath . $carrier . '/enabled'));

            if (isset($enabled)) {
                $insuranceActiveCarriers[$carrier] = ['enable' => $enabled, 'amount' => $insurancePrice];
            }
        }

        return json_encode($insuranceActiveCarriers);
    }
}