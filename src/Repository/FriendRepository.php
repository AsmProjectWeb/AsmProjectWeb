<?php

namespace App\Repository;

use App\Entity\Friend;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Friend>
 *
 * @method Friend|null find($id, $lockMode = null, $lockVersion = null)
 * @method Friend|null findOneBy(array $criteria, array $orderBy = null)
 * @method Friend[]    findAll()
 * @method Friend[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FriendRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Friend::class);
    }

    public function add(Friend $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Friend $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
        /**
    * @return User[] Returns an array of User objects
    */
    public function findFriendsUserById($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql ='
        SELECT u.*
        FROM friend f
        LEFT JOIN user u ON f.friend_user_id_id = u.id
        WHERE f.user_id_id = :id';
        $re = $conn->executeQuery($sql, ['id' => $id]);
        return $re->fetchAllAssociative();
    }

    //    /**
    //     * @return Friend[] Returns an array of Friend objects
    //     */
    //    public function findFriendById($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //         ->select()
    //            ->andWhere('f.userId = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }


    public function findFriendsByUserId(int $userId)
    {
        return $this->createQueryBuilder('f')
            ->select('u.id, u.username, u.avatar')
            ->join('f.FriendUserId', 'u')
            ->where('f.userId = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();
    }

    public function isFriend($from, $to): int {
        $conn = $this->getEntityManager()->getConnection();
        $sql ='SELECT * FROM `friend` WHERE user_id_id IN (:from,:to) AND friend_user_id_id IN (:from,:to)';
        $re = $conn->executeQuery($sql, ['from' => $from, 'to' => $to]);
        return $re->rowCount();
    }

    public function addFriend($from, $to):void{
        $conn = $this->getEntityManager()->getConnection();
        $sql ='INSERT INTO `friend`( `user_id_id`, `friend_user_id_id`) VALUES (:from,:to)';
        $re = $conn->executeQuery($sql, ['from' => $from, 'to' => $to]);
        $sql ='INSERT INTO `friend`( `user_id_id`, `friend_user_id_id`) VALUES (:to,:from)';
        $re = $conn->executeQuery($sql, ['from' => $from, 'to' => $to]);
    }

    //    public function findOneBySomeField($value): ?Friend
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
