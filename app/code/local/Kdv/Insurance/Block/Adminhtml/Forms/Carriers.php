<?php
/**
 * Created by PhpStorm.
 * User: d2.kozlovsky
 * Date: 22.9.17
 * Time: 17.21
 */

class Kdv_Insurance_Block_Adminhtml_Forms_Carriers extends Mage_Adminhtml_Block_System_Config_Form
{
    public function _prepareForm()
    {
        $activeCarriers = Mage::getSingleton('shipping/config')->getActiveCarriers();

        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save'),
                'method' => 'post',
                'enctype' => 'multipart/form-data'
            )
        );
        $form->setUseContainer(true);
        foreach ($activeCarriers as $carrier => $model) {
            $fieldset = $form->addFieldset($carrier, [
                'legend' => Mage::getStoreConfig('carriers/' . $carrier . '/title')
            ]);
            $fieldset->addField($carrier . '_insurance', 'select', [
                'name' => 'insurance[' . $carrier . '][enable]',
                'label' => 'Insurance enable',
                'values' => Mage::getModel('adminhtml/system_config_source_yesno')->toArray(),
                'value' => 0,
            ]);
            $fieldset->addField($carrier . '_mode', 'select', [
                'name' => 'insurance[' . $carrier . '][type]',
                'label' => 'Type',
                'values' => Mage::getModel('insurance/config_source_absolutepercent')->toArray(),
                'value' => 0,
            ]);
            $fieldset->addField($carrier . '_rate', 'text', [
                'name' => 'insurance[' . $carrier . '][cost]',
                'label' => 'Absolute cost',
                'value' => 0,
            ]);
        }
        $this->setForm($form);
        return $form->toHtml();
    }
}
