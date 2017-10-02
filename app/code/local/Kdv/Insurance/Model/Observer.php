<?php
/**
 * Created by PhpStorm.
 * User: d2.kozlovsky
 * Date: 25.9.17
 * Time: 20.20
 */

class Kdv_Insurance_Model_Observer
{
    public function saveCarriersAction()
    {
        $params = Mage::app()->getRequest()->getParam('insurance');
        $config = Mage::getConfig();

        foreach ($params as $carrierName => $settings) {
            $enable = $settings['enable'];
            $type = $settings['type'];
            $amount =$settings['cost'];

            $config->saveConfig('insurance/carriers/' . $carrierName .'/enabled' , $enable);
            $config->saveConfig('insurance/carriers/' . $carrierName .'/type' , $type);
            if (is_numeric($amount) && floatval($amount >= 0)) {
                $config->saveConfig('insurance/carriers/' . $carrierName .'/amount' , $amount);
            }
        }
    }
}