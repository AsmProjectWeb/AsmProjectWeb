<?php

namespace App\Repository;

use App\Entity\Mess;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mess>
 *
 * @method Mess|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mess|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mess[]    findAll()
 * @method Mess[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mess::class);
    }

    public function add(Mess $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Mess $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getIdConversation($from,$to): int {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "       
            SELECT u1.id, u1.username, p1.conversation_id as conv, u2.id, u2.username, COUNT(*)
            FROM 
                (user u1 INNER JOIN participant p1 ON u1.id = p1.iduser_id
                INNER JOIN conversation c1 ON p1.conversation_id = c1.id) INNER JOIN
                (user u2 INNER JOIN participant p2 ON u2.id = p2.iduser_id
                INNER JOIN conversation c2 ON p2.conversation_id = c2.id) ON p1.conversation_id = p2.conversation_id
            WHERE u1.id < u2.id  
            GROUP BY p1.conversation_id
            HAVING COUNT(*)=1 AND u1.id IN (:from, :to) AND u2.id IN (:from, :to)
        ";
        $re = $conn->executeQuery($sql,['from'=>$from,'to'=>$to]);
        if ($re->rowCount() == 0){
            $sql2 = "INSERT INTO `conversation` (`id`, `last_message_id`) VALUES (NULL, NULL)";
            $conn->executeQuery($sql2);
            $sql3 = "SELECT id as id FROM conversation ORDER BY id DESC LIMIT 1";
            $resql3 = $conn->executeQuery($sql3);
            $con = $resql3->fetchAllAssociative();
            $conId = intval($con[0]['id']);

            $sql4 = "INSERT INTO `participant`(`message_read_at`, `iduser_id`, `conversation_id`) VALUES (NOW(), :from, :conid)";
            $conn->executeQuery($sql4,['from'=>$from,'conid'=>$conId]);

            $sql4 = "INSERT INTO `participant`(`message_read_at`, `iduser_id`, `conversation_id`) VALUES (NOW(), :to, :conid)";
            $conn->executeQuery($sql4,['to'=>$to,'conid'=>$conId]);     
        } else {
            $conv = $re->fetchAllAssociative();
            $conId = intval($conv[0]['conv']);
        }
        return $conId;
    }

    public function sendMessPerson($conId,$from,$mess,$time): Mess
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql5 = "INSERT INTO `mess`( `content`, `create_at`, `conversation_id`, `user_id`) VALUES (:mess, NOW(), :conId, :from)";
        $conn->executeQuery($sql5,['mess'=>$mess,'conId'=>$conId,'from'=>$from]);

        $mess = $this->findOneBy([],['createAt' => 'DESC']);
        return $mess;
    }

//    /**
//     * @return Mess[] Returns an array of Mess objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Mess
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
