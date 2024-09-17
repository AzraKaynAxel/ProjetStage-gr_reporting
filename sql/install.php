<?php

//namespace gr_reporting\Service;
//require_once __DIR__ . '/modules/gr_reporting/Service/OrderPaymentError.php';
use gr_reporting\Service\OrderPaymentError;
use gr_reporting\Service\OrderMissingShipping;
use gr_reporting\Service\OrderPaymentAcceptedMore48;
use gr_reporting\Service\OrderAmountPaid;

//const AWAITING_TREATMENT = 'Awaiting treatment'; à approfondire

//  \ devant un élément permet de prendre celui de php et pas celui du namespace
$db = \Db::getInstance();
$orderPaymentError = new OrderPaymentError($db);
$orderMissingShipping = new OrderMissingShipping($db);
$orderPaymentAcceptedMore48 = new OrderPaymentAcceptedMore48($db);
$orderAmountPaid = new OrderAmountPaid($db);

$sql = array();

//Table for type of reporting error
$sql[] =  'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'gr_reporting` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_order` INT NOT NULL,
    `reference` VARCHAR(9) NULL,
    `date_order` DATE NOT NULL,
    `libelle_error` VARCHAR(64) NOT NULL,
    `status_error` VARCHAR(50) NOT NULL,
    `date_add` DATE NOT NULL,
    `date_update` DATE NULL,
    PRIMARY KEY(`id`)
    )'
;

/*Permet de conserver l'intégralité des données de plusieurs tableau,
les fusionne et réindex le tableau // array_merge($array1, $array2)*/

$sql = array_merge($sql, $orderPaymentError->getOrderPaymentError());
$sql = array_merge($sql, $orderMissingShipping->setOrderMissingShipping());
$sql = array_merge($sql, $orderPaymentAcceptedMore48->setOrderPaidMore48());
$sql = array_merge($sql, $orderAmountPaid->setOrderAmountPaid());