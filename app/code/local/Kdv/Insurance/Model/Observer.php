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
    }
}