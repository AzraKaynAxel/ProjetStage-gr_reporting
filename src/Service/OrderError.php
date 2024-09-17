<?php

namespace gr_reporting\Service;


class OrderError
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    //array $filterTypes=[]


    public function getAllOrderError($from, $to, $searchQuery, $filterType=[])
    {

        $clauses=[];
        $clauses[] = ' 1 ';

        if ($from && $to){
            $clauses[]=' gr.date_add BETWEEN "'.pSQL($from).'" AND "'.pSQL($to).'"';
        }

        if ($searchQuery){
            $clauses[]=' gr.reference = "'.pSQL($searchQuery).'"';
        }

        if (!empty($filterType)){
            $clauses[]=' gr.libelle_error IN ('.implode(',', $filterType).')';
        }

        $tableName = '`'._DB_PREFIX_.'gr_reporting` ';
        $where = implode(' AND ', $clauses);

        $selectAll=<<<SQL
        SELECT * FROM $tableName gr
        WHERE $where
SQL;


        $result = $this->db->executeS($selectAll);

        return $result;
    }

}