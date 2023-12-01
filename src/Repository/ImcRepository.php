<?php

namespace App\Repository;

use App\Entity\Imc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Imc>
 *
 * @method Imc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imc[]    findAll()
 * @method Imc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImcRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Imc::class);
    }

//    /**
//     * @return Imc[] Returns an array of Imc objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Imc
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
