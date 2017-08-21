<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository 
{
    public function getAll(array $options = [])
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        
        $q = $qb->select('p')
                ->from('AppBundle:Products', 'p');
               
        if (!empty($options['max'])) {
            $q = $q->where('p.price >= :min')->setParameter('min', $options['min']);
        }
                
        if (!empty($options['max'])) {
            $q =  $q->andWhere('p.price <= :max') ->setParameter('max', $options['max']);
        }
                
        if ($options['cat'] != "all" && $options['cat'] !== null) {
            $q =  $q->andWhere('p.category = :cat')->setParameter('cat', $options['cat']);
        }
                
        switch ($options['sort']) {
            case 'za':
            {
                $q->orderBy('p.name', 'DESC');
                break;
            }
            case 'minp':
            {
                $q->orderBy('p.price', 'ASC');
                break;
            }
            case 'maxp':
            {
                $q->orderBy('p.price', 'DESC');
                break;
            }
            default:
            {
                $q->orderBy('p.name', 'ASC');
                break;
            }
        }
        return $q->getQuery()->getArrayResult();
    }
    
}
