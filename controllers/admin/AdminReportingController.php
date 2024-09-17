<?php

//namespace gr_reporting\controllers;

use PrestaShop\PrestaShop\Adapter\Entity\ModuleAdminController;
use gr_reporting\Service\OrderError;
use gr_reporting\Forms\FormField;
use gr_reporting\Forms\FormValidator;

class AdminReportingController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->display = 'view';
        $this->bootstrap = true;
    }

    public function viewAccess($disable = false)
    {
        return true;
    }

    public function initContent()
    {
        parent::initContent();

        $db = \Db::getInstance();
        $orders = new OrderError($db);
        $form = new FormField();
        $validator = new FormValidator();

        $from = Tools::getValue('dateFrom');//Keep value to null if not select by user
        $to = Tools::getValue('dateTo');
        $searchQuery = Tools::getValue('search');

        $formValidator = null;

        if (Tools::isSubmit('submit')){
            $formValidator = $validator->validate();

                if (isset($formValidator) && !count($this->errors)) {

                    $this->context->employee->update();
                }
        }
      
        $filterTypes = array();

        // Check that  $key (name of field) begins by 'filter_' then add value on $filterTypes
        foreach (Tools::getAllValues() as $key => $value) {

            if (strripos($key, 'filter_') !== false) {
                // put the filter variable here and put separator between it: ""
                // mettre la variable filtre ici et mettre des séparateur entre elle: ""

                $filterTypes[] = '"' . $value . '"';
            }
        }


        $ordersList = $orders->getAllOrderError($from, $to, $searchQuery, $filterTypes);
        $formFields = $form->getFormFields(); // Make sure this returns an array of form fields

        $this->context->smarty->assign('orders', $ordersList);
        $this->context->smarty->assign('formFields', $formFields); // Assign the array directly

        $content = $this->context->smarty->fetch('module:gr_reporting/views/templates/admin/view.tpl');
        $this->context->smarty->assign('content', $this->content . $content);
    }

    //Loading field js an css
    public function setMedia($isNewTheme = false)
    {
        parent::setMedia();
        $this->context->controller->addJS(_PS_MODULE_DIR_ . 'gr_reporting/views/js/processingForm.js');
        $this->context->controller->addCSS(_PS_MODULE_DIR_ . 'gr_reporting/views/css/style.css');
    }
}