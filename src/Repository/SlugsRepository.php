<?php

namespace App\Repository;

use App\Entity\Slugs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Slugs>
 *
 * @method Slugs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Slugs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Slugs[]    findAll()
 * @method Slugs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SlugsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Slugs::class);
    }

    //    /**
    //     * @return Slugs[] Returns an array of Slugs objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Slugs
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
