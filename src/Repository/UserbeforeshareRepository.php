<?php

namespace App\Repository;

use App\Entity\Userbeforeshare;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Userbeforeshare>
 *
 * @method Userbeforeshare|null find($id, $lockMode = null, $lockVersion = null)
 * @method Userbeforeshare|null findOneBy(array $criteria, array $orderBy = null)
 * @method Userbeforeshare[]    findAll()
 * @method Userbeforeshare[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserbeforeshareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Userbeforeshare::class);
    }

    public function add(Userbeforeshare $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Userbeforeshare $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Userbeforeshare[] Returns an array of Userbeforeshare objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Userbeforeshare
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
