<?php

namespace gr_reporting\Service;

class OrderMissingShipping
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getOrderMissingShipping(): array
    {
        $selectMissingShippingQuery = 'SELECT o.id_order, o.reference, o.current_state, o.date_add 
            FROM `'._DB_PREFIX_.'orders` o
            LEFT JOIN `'._DB_PREFIX_.'order_shipments` os on o.id_order = os.id_order 
            WHERE os.shipment = "" AND o.date_add >= date_format("2024-01-01", "%Y-%m-%d")';

        $result = $this->db->executeS($selectMissingShippingQuery);

        return $result;
    }

    public function setOrderMissingShipping(): array
    {
        $awaitingTreatment = 'Awaiting treatment';
        $date_add = new \DateTimeImmutable('now', );
        $date_update = null;

        $listMissingShipping = $this->getOrderMissingShipping();

        foreach ($listMissingShipping as $row){
            $row['current_state'] = 'Tracking manquant';

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