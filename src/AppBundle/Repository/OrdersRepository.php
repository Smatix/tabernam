<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OrdersRepository extends EntityRepository 
{
    public function showByUser($id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $q = $qb->select('o', 'p')
                ->from('AppBundle:Orders', 'o')
                ->join('o.idProduct', 'p')
                ->where('o.idUser = :id')
                ->setParameter('id', $id);
        
        return $q->getQuery()->getArrayResult();
    }
    
}
