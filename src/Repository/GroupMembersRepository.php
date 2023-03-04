<?php

namespace App\Repository;

use App\Entity\GroupMembers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GroupMembers>
 *
 * @method GroupMembers|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupMembers|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupMembers[]    findAll()
 * @method GroupMembers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupMembersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupMembers::class);
    }

    public function add(GroupMembers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(GroupMembers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * @return Post[] Returns an array of Customer objects
     */
    public function findUserInGroup($gid,$uid): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '       
        SELECT u.id, u.username, u.avatar, u.email, u.phone, u.birthday, u.hometown, u.gender, u.job, gm.rolemember
        FROM user u
        JOIN group_members gm ON u.id = gm.user_id
        WHERE gm.groupid_id = :gid AND u.id = :uid;
';
        $re = $conn->executeQuery($sql, ['uid' => $uid, 'gid'=>$gid]);
        return $re->fetchAllAssociative();
    }
//    /**
//     * @return GroupMembers[] Returns an array of GroupMembers objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GroupMembers
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
