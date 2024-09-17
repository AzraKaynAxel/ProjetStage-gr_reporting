<?php

namespace App\Repository;


use App\Entity\Order;

/**
 *
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class OrderRepository extends ServiceEntityRepository
{
        public function __construct(ManagerRegistry $registry)
        {
            parent::__construct($registry, ReportingError::class);
        }

    public function findOrderByCurrentState(): array
    {
        $selecteOrderErrore = $this->createQueryBuilder('o')
            ->where('o.currentStatus = 8');

        return $selecteOrderErrore->getQuery()->getResult();
    }
}