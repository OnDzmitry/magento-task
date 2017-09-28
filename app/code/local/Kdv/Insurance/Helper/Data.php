<?php
/**
 * Created by PhpStorm.
 * User: d2.kozlovsky
 * Date: 28.9.17
 * Time: 15.19
 */
class Kdv_Insurance_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getInsurancePrice($carrier)
    {
        $insurancePrice = null;
        $carriersPath = 'insurance/carriers/';
        $config = Mage::getConfig();
        $amount = array_shift($config->getStoresConfigByPath($carriersPath . $carrier . '/amount'));
        $type = array_shift($config->getStoresConfigByPath($carriersPath . $carrier . '/type'));

        $subtotal = Mage::helper('checkout')->getQuote()->getData()['subtotal'];

        if ($type == 0) {
            $insurancePrice = $subtotal / 100 * floatval($amount);
        } else {
            $insurancePrice = $amount;
        }
        return $insurancePrice;
    }

    public function getConfigInsurancePath()
    {
        return 'insurance/carriers/';
    }
}