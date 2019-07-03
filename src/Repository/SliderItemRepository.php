<?php

namespace App\Repository;

use App\Entity\SliderItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SliderItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method SliderItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method SliderItem[]    findAll()
 * @method SliderItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SliderItemRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SliderItem::class);
    }

    // /**
    //  * @return SliderItem[] Returns an array of SliderItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SliderItem
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
