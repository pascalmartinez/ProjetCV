<?php

namespace App\Repository;

use App\Entity\Experiences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Experiences|null find($id, $lockMode = null, $lockVersion = null)
 * @method Experiences|null findOneBy(array $criteria, array $orderBy = null)
 * @method Experiences[]    findAll()
 * @method Experiences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExperiencesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Experiences::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('e')
            ->where('e.something = :value')->setParameter('value', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
