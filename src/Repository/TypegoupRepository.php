<?php

namespace App\Repository;

use App\Entity\Typegoup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Typegoup>
 *
 * @method Typegoup|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typegoup|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typegoup[]    findAll()
 * @method Typegoup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypegoupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typegoup::class);
    }

    public function add(Typegoup $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Typegoup $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * @return Post[] Returns an array of Customer objects
     */
    public function addType($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql ="
        INSERT INTO `typegoup`(`type_ground`) VALUES  ( :id ) ";
        $re = $conn->executeQuery($sql, ['id'=>$id]);
        return $re->fetchAllAssociative();
    }

    /**
     * @return Post[] Returns an array of Customer objects
     */
    public function editType($id, $edittype): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql ="
        UPDATE `typegoup` SET `type_ground`= :edittype WHERE typegoup.id = :id ";
        $re = $conn->executeQuery($sql, [ 'edittype'=>$edittype, 'id'=>$id]);
        return $re->fetchAllAssociative();
    }

    /**
     * @return Post[] Returns an array of Customer objects
     */
    public function deleteType($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql ="
        DELETE FROM `typegoup` WHERE id = :id ";
        $re = $conn->executeQuery($sql, ['id'=>$id]);
        return $re->fetchAllAssociative();
    }
//    /**
//     * @return Typegoup[] Returns an array of Typegoup objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Typegoup
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
