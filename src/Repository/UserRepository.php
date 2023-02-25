<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function add(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->add($user, true);
    }

   /**
    * @return User[] Returns an array of User objects
    */
   public function findAvatar($value): array
   {
    $db = $this->createQueryBuilder('u');
    return $db
        ->select('u.avatar')
        ->where('u.id like :val')
        ->setParameter('val', $value)
        ->getQuery()
        ->getResult()
    ;
   }

   /**
    * @return User[] Returns an array of User objects
    */
    public function findUserByName($value,$number): array
    {
     $db = $this->createQueryBuilder('u');
     return $db->where('u.username like :val')
         ->setParameter('val', '%'.$value.'%')
         ->setMaxResults($number)
         ->getQuery()
         ->getResult()
     ;
    }

    /**
    * @return User[] Returns an array of User objects
    */
    public function findFriendOfIdByName($id,$name): array
    {
        // SELECT cus.name, count(DISTINCT(c.id)), sum((cs.prize) * (1 - s.discount))
        // FROM customer cus inner join sale s on cus.id=s.sale_cus_id
        // inner join car c on s.car_id = c.id
        // inner join carsup cs on cs.cars_id = c.id
        // WHERE cus.id = :id

        // SELECT u.username, u.avatar
        // FROM Friend f left JOIN User u on f.FriendUserId = u.id 
        // WHERE u.userId = :id

        $conn = $this->getEntityManager()->getConnection();
        $sql = "       
        SELECT u.username, u.avatar 
        FROM friend f left JOIN user u on f.friend_user_id_id = u.id 
        WHERE user_id_id = :id 
        HAVING u.username like :name
        ";
        $re = $conn->executeQuery($sql,['id'=>$id,'name'=>'%'.$name.'%']);
        return $re->fetchAllAssociative();
    }

//    /**
//     * @return User[] Returns an array of User objects
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

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
