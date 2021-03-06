<?php

namespace App\Repository;

use App\Entity\Accaunt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class AccauntRepository extends ServiceEntityRepository
{


    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Accaunt::class);
        /**
         * @link https://symfony.com/doc/current/doctrine.html#querying-for-objects-the-repository
         */

    }

    public function save($accaunt)
    {
        $entity = $this->getEntityManager();
        $entity->persist($accaunt);
        $entity->flush();
    }


}