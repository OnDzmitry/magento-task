<?php
/**
 * Created by PhpStorm.
 * User: d2.kozlovsky
 * Date: 22.9.17
 * Time: 17.21
 */

class Kdv_Insurance_Block_Adminhtml_System_Config_Carriers extends Mage_Adminhtml_Block_System_Config_Form
{
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $activeCarriers = Mage::getSingleton('shipping/config')->getActiveCarriers();
        $this->setElement($element);
        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post',
                'enctype' => 'multipart/form-data'
            )
        );
        $form->setUseContainer(true);
        $fieldset = $form->addFieldset('id', [
            'legend' => Mage::getStoreConfig('carriers/' . 'legend' . '/title'),
        ]);
        $fieldset->addField('car' . '_rate', 'text', [
            'name' => 'insurance[' . 'Carrier' . '][rate]',
            'label' => 'Name',
            'value' => ' ',
        ]);
        return $form->toHtml();
    }
}
