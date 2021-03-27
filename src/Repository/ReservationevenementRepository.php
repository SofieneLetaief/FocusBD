<?php

namespace App\Repository;

use App\Entity\Reservationevenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reservationevenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservationevenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservationevenement[]    findAll()
 * @method Reservationevenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationevenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservationevenement::class);
    }

    // /**
    //  * @return Reservationevenement[] Returns an array of Reservationevenement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reservationevenement
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
