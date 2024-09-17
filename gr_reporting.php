<?php

if(!defined('_PS_VERSION_')){
    exit;
}

    // permet de faire comprendre à prestashop ou autres cms que
    // l'or du chargement du module les namespace sont utilisables
if (file_exists(_PS_MODULE_DIR_. 'gr_reporting/vendor/autoload.php')) {
    require_once _PS_MODULE_DIR_ . 'gr_reporting/vendor/autoload.php';
}

class Gr_Reporting extends Module
{
    public function __construct()
    {
      
        $this->name = 'gr_reporting';
        $this->version = '1.0.0';
        $this->author = 'Axel Hayalian';
        $this->ps_versions_compliancy = [
            'min' => '1.6.0',
            'max' => '1.7.9',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Commandes en Erreur');
        $this->description = $this->l('This module is designed to defer commands that have an error.');

        $this->confirmUninstall = $this ->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        $sql = array();
        include(dirname(__FILE__).'/sql/install.php');
        foreach ($sql as $s )
        {
            if (!Db::getInstance()->execute($s)){
                d($s);
                return false;
            }
        }

        if(!parent::install() || !$this->installTab()){
            return false;
        }
        return true;

    }
          
    public function uninstall()
    {
        $sql = array();
        include(dirname(__FILE__).'/sql/uninstall.php');
        foreach ($sql as $s )
        {
            if (!Db::getInstance()->execute($s)){
                d($s);
                return false;
            }
        }

        if(!parent::uninstall() || !$this->uninstallTab()){
            return false;
        }
        return true;
    }

    public function installTab()
    {
        //Initialise la variable
        $tab = new Tab();

        $tab->name = 'Commande en erreur';
        $tab->class_name = 'AdminReporting';
        $tab->id_parent = Tab::getIdFromClassName('IMPROVE'); // Remplacez 'SELL' par le menu parent désiré
        $tab->module = $this->name;

        return $tab->add();
    }
  
    public function uninstallTab()
    {
        $idTab = Tab::getIdFromClassName('AdminReporting');
        if ($idTab) {
            $tab = new Tab($idTab);
            return $tab->delete();
        }
        return true;
    }
}