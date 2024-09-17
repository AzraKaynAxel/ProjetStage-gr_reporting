<?php

namespace gr_reporting\Service;

class OrderAmountPaid
{
    public function __construct($db){
        $this->db = $db;
    }

    public function getOrderAmountPaid(): array
    {
        $selectOrderAmountPaid = 'SELECT o.id_order, o.reference, o.current_state, o.date_add 
            FROM `'._DB_PREFIX_.'orders` o
            WHERE o.current_state = 4 AND o.total_paid_tax_incl != o.total_paid_real';

        $result = $this->db->executeS($selectOrderAmountPaid);

        return $result;
    }

    public function setOrderAmountPaid(): array
    {
        $awaitingTreatment = 'Awaiting treatment';
        $date_add = new \DateTimeImmutable('now', );
        $date_update = null;

        $listMissingShipping = $this->getOrderAmountPaid();

        foreach ($listMissingShipping as $row){
            $row['current_state'] = 'Montant payé/facture différent';

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