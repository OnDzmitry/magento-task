<?php
/**
 * Created by PhpStorm.
 * User: d2.kozlovsky
 * Date: 2.10.17
 * Time: 20.54
 */

class Kdv_Insurances_Block_Adminhtml_Sales_Creditmemo extends Mage_Adminhtml_Block_Sales_Order_Creditmemo_Totals {

    protected function _initTotals () {
        parent::_initTotals();
        $amount = $this->getOrder()->getInsurance();
        if ($amount) {
            $this->addTotalBefore(new Varien_Object(['code' => 'insurance', 'value' => $amount, 'base_value' => $amount, 'label' => 'insurance',], ['shipping', 'tax']));
        }
        return $this;
    }
}