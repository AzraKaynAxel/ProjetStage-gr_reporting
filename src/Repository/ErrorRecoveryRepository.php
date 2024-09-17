<?php

use App\Entity\ReportingError;

/**
 *
 * @method ReportingError|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReportingError|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReportingError[]    findAll()
 * @method ReportingError[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class ErrorRecoveryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReportingError::class);
    }

    /*public function findByCurrentState(): array
    {
        $qb = $this->createQueryBuilder('e')
            ->addSelect('o')
            ->join('e.idOrder', 'o')
            ->where('o.currentState = 8');
            //->setParameter('currentState', $)


    }*/
}
