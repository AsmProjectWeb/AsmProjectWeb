<?php

namespace App\Repository;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Friend;
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

    /**
     * @return Post[] Returns an array of Post objects
     */
    public function findPostByContent($value, $number): array
    {
        $db = $this->createQueryBuilder('p');
        return $db->where('p.content like :val')
            ->setParameter('val', '%' . $value . '%')
            ->setMaxResults($number)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Post[] Returns an array of Customer objects
     */
    public function findPostsForUser($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '       
            SELECT p.*, u.*, pl.*,pl.user_id as userliked, p.id as idpost
            FROM post p
            LEFT JOIN user u ON p.post_user_id_id = u.id
            LEFT JOIN (
            SELECT pl1.post_id, SUM(pl1.isliked) AS total_likes
            FROM post_liked pl1
            WHERE pl1.isliked = 0
            GROUP BY pl1.post_id
            ) pl1 ON p.id = pl1.post_id
            LEFT JOIN post_liked pl ON p.id = pl.post_id AND pl.user_id = :id
            WHERE p.post_user_id_id = :id OR p.post_user_id_id IN (
            SELECT f.friend_user_id_id
            FROM friend f
            WHERE f.user_id_id = :id
            ) OR p.id IN (
            SELECT gp.post_id_id
            FROM group_post gp
            JOIN group_members gm ON gp.group_id_id = gm.groupid_id
            WHERE gm.user_id = :id
            )
            ORDER BY p.date DESC;
        ';
        $re = $conn->executeQuery($sql, ['id' => $id]);
        return $re->fetchAllAssociative();
    }

    /**
     * @return Post[] Returns an array of Customer objects
     */
    public function findPostsInProfile($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql ='
        SELECT post.*, u.* FROM post
        LEFT JOIN USER u on u.id = post.post_user_id_id 
        WHERE u.id = :id';
        $re = $conn->executeQuery($sql, ['id' => $id]);
        return $re->fetchAllAssociative();
    }

    /**
     * @return Post[] Returns an array of Customer objects
     */
    public function findPostsInGroup($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql ='
        SELECT post.*, u.* FROM post
        LEFT JOIN group_post gp on gp.post_id_id = post.id
        LEFT JOIN groups g on g.id = gp.group_id_id
        LEFT JOIN `user` u on u.id = post.post_user_id_id
        WHERE g.id =  :id';
        $re = $conn->executeQuery($sql, ['id' => $id]);
        return $re->fetchAllAssociative();
    }

    /**
     * @return Post[] Returns an array of Customer objects
     */
    public function findPostsReported(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql ='
        SELECT * FROM `post` 
        INNER JOIN user u on u.id = post.post_user_id_id
        INNER JOIN report r on r.postid_id = post.id';
        $re = $conn->executeQuery($sql);
        return $re->fetchAllAssociative();
    }
    
    /**
     * @return Post[] Returns an array of Customer objects
     */
    public function RemovePost($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql ='
        DELETE FROM `post` WHERE post.id = :id';
        $re = $conn->executeQuery($sql, ['id'=>$id]);
        return $re->fetchAllAssociative();
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
