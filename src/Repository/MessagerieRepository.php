<?php

namespace App\Repository;

use App\Entity\Messagerie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Messagerie>
 *
 * @method Messagerie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Messagerie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Messagerie[]    findAll()
 * @method Messagerie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessagerieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Messagerie::class);
    }
}
