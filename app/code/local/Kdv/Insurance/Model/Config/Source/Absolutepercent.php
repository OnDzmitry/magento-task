<?php
/**
 * Created by PhpStorm.
 * User: d2.kozlovsky
 * Date: 25.9.17
 * Time: 20.28
 */
class Kdv_Insurance_Model_Config_Source_Absolutepercent
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 1, 'label' => Mage::helper('adminhtml')->__('Absolute')),
            array('value' => 0, 'label' => Mage::helper('adminhtml')->__('Percent')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            0 => Mage::helper('adminhtml')->__('Percent'),
            1 => Mage::helper('adminhtml')->__('Absolute'),
        );
    }
}