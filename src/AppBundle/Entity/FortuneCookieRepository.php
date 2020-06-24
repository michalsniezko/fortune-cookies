<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FortuneCookieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FortuneCookieRepository extends EntityRepository
{
    public function countNumberPrintedForCategory(Category $category)
    {
//        $conn = $this->getEntityManager()->getConnection();
//        $sql = '
//            SELECT SUM(fc.numberPrinted) as fortunesPrinted, AVG(fc.numberPrinted) as fortunesAverage, cat.name
//            FROM fortune_cookie fc
//            INNER JOIN category cat ON cat.id = fc.category_id
//            WHERE fc.category_id = :category
//        ';
//
//        $stmt = $conn->prepare($sql);
//        $stmt->execute(['category' => $category->getId()]);
//        return $stmt->fetch();


        return $this->createQueryBuilder('fc')
            ->andWhere('fc.category = :category')
            ->setParameter('category', $category)
            ->innerJoin('fc.category', 'cat')
            ->select('SUM(fc.numberPrinted) as fortunesPrinted, AVG(fc.numberPrinted) as fortunesAverage, cat.name')
            ->getQuery()
            ->getOneOrNullResult();
    }
}