<?php

namespace GameBundle\Repository;

/**
 * TownBuldingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TownBuldingRepository extends \Doctrine\ORM\EntityRepository
{
    public function getBuilding($id){
        return $this->getEntityManager()
            ->createQuery(
                'SELECT tb, b, r, bt FROM GameBundle:TownBuilding tb
                     JOIN tb.building b
                     LEFT JOIN b.required r
                     JOIN b.buildingType bt
                     JOIN b.towns on
                     WHERE b.id = :id'
            )
            ->setParameter('id', $id)
            ->getOneOrNullResult();
    }
}
