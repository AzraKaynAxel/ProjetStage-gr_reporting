<?php

namespace gr_reporting\Service;

class OrderPaymentAcceptedMore48
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getOrderPaidMore48(): array
    {
        $selectOrderPaidMore48 = 'SELECT o.id_order, o.reference, o.current_state, o.date_add 
            FROM `'._DB_PREFIX_.'orders` o
            WHERE o.current_state = 2 AND o.date_add <= DATE_SUB(NOW(), INTERVAL 2 DAY)';

        $result = $this->db->executeS($selectOrderPaidMore48);

        return $result;
    }

    public function setOrderPaidMore48(): array
    {
        $awaitingTreatment = 'Awaiting treatment';
        $date_add = new \DateTimeImmutable('now', );
        $date_update = null;

        $listOrderMore48 = $this->getOrderPaidMore48();

        foreach ($listOrderMore48 as $row){
            $row['current_state'] = 'Paiement +48H';

            $sql[] = 'INSERT INTO `' . _DB_PREFIX_ . 'gr_reporting`(id_order, reference, date_order, libelle_error, status_error, date_add, date_update)
            VALUES(
            ' . $row['id_order'] . ',
            "' . pSQL($row['reference']) . '",
            "' . pSQL($row['date_add']) . '",
            "' . pSQL($row['current_state']) . '",
            "' . pSQL($awaitingTreatment) . '",
            "' . $date_add->format('Y-m-d H:i:s') . '",
            "' . $date_update . '")';
        }
        return $sql;
    }
}