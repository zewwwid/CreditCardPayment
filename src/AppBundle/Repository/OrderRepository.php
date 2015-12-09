<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OrderRepository extends EntityRepository
{
    /**
     * @param $pk Order primaryKey
     * @return AppBundle\Entity\Order
     */
    public function getByPK($pk)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT o FROM AppBundle:Order o WHERE o.primaryKey = :pk')
            ->setParameter('pk', $pk)
            ->getOneOrNullResult();
    }
    
    /**
     * @return AppBundle\Entity\Order
     */
    public function getAll()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT o FROM AppBundle:Order o')
            ->getResult();
    }
}