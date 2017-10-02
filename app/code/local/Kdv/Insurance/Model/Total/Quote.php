<?php
/**
 * Created by PhpStorm.
 * User: d2.kozlovsky
 * Date: 28.9.17
 * Time: 17.16
 */

class Kdv_Insurance_Model_Total_Insurance_Quote extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    public function __construct () {
        $this->setCode('insurance');
    }

    public function collect (Mage_Sales_Model_Quote_Address $address) {
        parent::collect($address);
        if (($address->getAddressType() == 'billing')) {
            return $this;
        }
        $carrier = array_shift(explode('_',$address->getShippingMethod()));
        $insurancePrice = 0;

        $insuranceStatus = $_REQUEST['insurance-enable'];

        if ($insuranceStatus == 1) {
            $insurancePrice = Mage::helper('insurance')->getInsurancePrice($carrier);

            $address->getQuote()->setInsuranceAmount($insurancePrice);
            $address->getQuote()->setBaseInsuranceAmount($insurancePrice);

            $this->_addAmount($insurancePrice);
            $this->_addBaseAmount($insurancePrice);
        }
        //$amount = floatval(htmlspecialchars($_COOKIE['insurance']));
        return $this;
    }

    public function fetch (Mage_Sales_Model_Quote_Address $address) {
        $amount = $address->getQuote()->getInsuranceAmount();
        if (($address->getAddressType() == 'billing')) {
            if ($amount != 0) {
                $address->addTotal(['code' => $this->getCode(), 'title' => 'insurance', 'value' => $amount]);
            }
        }
        return $this;
    }
}