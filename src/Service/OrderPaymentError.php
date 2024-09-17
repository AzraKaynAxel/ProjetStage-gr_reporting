<?php

namespace gr_reporting\Service;
//namespace App\Service;


class OrderPaymentError
{
    public function __construct($db){
        $this->db = $db;
    }

    public function getOrderPaymentError(): array
    {
        $awaitingTreatment = 'Awaiting treatment';
        $date_add = new \DateTimeImmutable('now', );
        $date_update = null;

        //Requêtes pour récupérer les commandes avec des erreurs ayant une erreur de paiement

        $selecteErrorQuery =
            'SELECT o.id_order, o.reference, o.current_state, o.date_add 
            FROM `'._DB_PREFIX_.'orders` o
            WHERE o.current_state = 8 AND o.date_add >= date_format("2024-01-01", "%Y-%m-%d")';

        $result = $this->db->executeS($selecteErrorQuery);



        foreach ($result as $row) {
            switch ($row['current_state']) {
                case 8 :
                    $row['current_state'] = 'Erreur de paiement';
                    break;
                default :
                    $row['current_state'] = 'Pas encore défini';
            }

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