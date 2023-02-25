<?php

namespace App\Repository;

use App\Entity\PostLiked;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PostLiked>
 *
 * @method PostLiked|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostLiked|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostLiked[]    findAll()
 * @method PostLiked[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostLikedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostLiked::class);
    }

    public function add(PostLiked $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PostLiked $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * @return Post[] Returns an array of Customer objects
     */
    public function RemovePostLiked($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql ='
        DELETE FROM `post_liked` WHERE post_liked.post_id = :id';
        $re = $conn->executeQuery($sql, ['id'=>$id]);
        return $re->fetchAllAssociative();
    }
//    /**
//     * @return PostLiked[] Returns an array of PostLiked objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PostLiked
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
