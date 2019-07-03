<?php

namespace App\Repository;

use App\Entity\RoomType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RoomType|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoomType|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoomType[]    findAll()
 * @method RoomType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RoomType::class);
    }

    // /**
    //  * @return RoomType[] Returns an array of RoomType objects
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
    public function findOneBySomeField($value): ?RoomType
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
