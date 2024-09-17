<?php

namespace gr_reporting\Forms;

use PrestaShop\PrestaShop\Adapter\Validate;
use Tools;

class FormValidator
{
    private $errors = [];
    private $from;
    private $to;
    private $searchQuery;


    public function validate(){

        $this->from = Tools::getValue('dateFrom');
        $this->to = Tools::getValue('dateTo');
        $this->searchQuery = Tools::getValue('search');

        //Check field is valid and getValue retrieves the values
        if (!empty(trim($this->from)) && !empty(trim($this->to)) && !$this->isValidDate($this->from, $this->to)) {
            $this->addError(Tools::displayError('please enter a valid date'));
        }

        if (!empty(trim($this->searchQuery)) && (!$this->isAlpha($this->searchQuery))) {
            $this->addError(Tools::displayError('please enter only alphabetic characters'));
        }

        return $this->errors;

    }

    /*public function getData($data)
    {
        $data = [];
        $this

        return $data;
    }*/

    private function isValidDate($from, $to)
    {
        return Validate::isDate($from) && Validate::isDate($to) && strtotime($from) < strtotime($to);
    }

    private function isAlpha($value)
    {
        return preg_match('/^[a-zA-Z]+$/', $value);
    }

    private function addError($error)
    {
        $this->errors[] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

}