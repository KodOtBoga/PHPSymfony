<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Chat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ChatRepository extends ServiceEntityRepository 
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Chat::class);
    }

    public function findPersonalChat(User $firstUser, User $secondUser)
    {
        $qb = $this->createQueryBuilder('c');
        $qb
            ->innerJoin('c.users', 'u')
            ->andWhere('u.id = :firstUser')
            ->andWhere('u.id = :secondUser')

            ->setParameter('firstUser', $firstUser)
            ->setParameter('secondUser', $secondUser)
            ;

            return $qb->getQuery()->getResult();
    }

   
}
