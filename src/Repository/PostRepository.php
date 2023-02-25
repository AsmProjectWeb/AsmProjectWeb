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
        SELECT DISTINCT post.*, u.*, f.*, gm.*, g.*, gp.* FROM post 
        LEFT JOIN user u ON u.id = post.post_user_id_id 
        LEFT JOIN friend f on f.user_id_id = u.id 
        LEFT JOIN group_members gm on gm.user_id = u.id 
        LEFT JOIN groups g ON gm.groupid_id = g.id 
        LEFT JOIN group_post gp on gp.group_id_id=g.id 
        WHERE post.post_user_id_id = u.id OR f.friend_user_id_id = (SELECT friend.friend_user_id_id FROM friend WHERE friend.user_id_id = u.id) and u.id= :id OR gp.group_id_id = (SELECT groups.id FROM groups WHERE gm.user_id=u.id and g.id = gm.groupid_id)
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
