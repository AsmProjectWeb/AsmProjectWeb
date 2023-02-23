<?php

namespace App\Repository;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function add(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //  /**
    // * @return Post[] Returns an array of Post objects
    // */  
    // public function findPostByContent($value,$number): array{
    //      $db = $this->createQueryBuilder('p');
    //      return $db->where('p.content like :val')
    //          ->setParameter('val', '%'.$value.'%')
    //          ->setMaxResults($number)
    //          ->getQuery()
    //          ->getResult()
    //      ;
    //     }

    public function findPostsForUser(User $user)
    {
        $now = new \DateTime();
        $twoWeeksAgo = $now->modify('-2 weeks');
        
        return $this->createQueryBuilder('p')
            ->innerJoin('p.Post_UserID', 'u')
            ->innerJoin('p.IdPost', 'pg')
            ->innerJoin('pg.GroupID', 'g')
            ->innerJoin('u.FriendUser', 'f')
            ->innerJoin('u.user', 'gm')
            ->where('(p.date >= :twoWeeksAgo)')
            ->andWhere('(p.Post_UserID = :user) OR (gm.id = :user_id) OR (f.FriendUserId = :user_id)')
            ->setParameter('twoWeeksAgo', $twoWeeksAgo)
            ->setParameter('user', $user)
            ->setParameter('user_id', $user->getId())
            ->orderBy('p.date', 'DESC')
            ->getQuery()
            ->getResult();
    }
    
    


    //    /**
    //     * @return Post[] Returns an array of Post objects
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

    //    public function findOneBySomeField($value): ?Post
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
