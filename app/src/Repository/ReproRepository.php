<?php

namespace App\Repository;

use App\Entity\Repro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Repro>
 *
 * @method Repro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Repro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Repro[]    findAll()
 * @method Repro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReproRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Repro::class);
    }

//    /**
//     * @return Repro[] Returns an array of Repro objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Repro
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
