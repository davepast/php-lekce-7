<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * @return Book[]
     */
    public function getBooksByCenturies(int $minYear, int $maxYear)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.issueYear <= :maxYear')
            ->setParameter('maxYear', $maxYear)
            ->andWhere('b.issueYear >= :minYear')
            ->setParameter('minYear', $minYear)
            ->orderBy('b.issueYear', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Book[]
     */
    public function getAllBooks()
    {

        return $this->findAll();
    }

    /**
     * @return Book[]
     */
    public function getAuthors()
    {
        return $this->createQueryBuilder('autori')
            ->select('autori.author')
            ->andWhere('autori.author IS NOT NULL')
            ->groupBy('autori.author')
            ->getQuery()
            ->getResult();

    }

    /**
     * @return Book[]
     */
    public function getBooksByPrice()
    {
        return $this->findby([], ['price' => 'ASC']);
    }

    /**
     * @return Book[]
     */
    public function getNewBooks()
    {
        return $this->createQueryBuilder('newOnes')
            ->andWhere('newOnes.issueYear > 2017')
            ->orderBy('newOnes.issueYear')
            ->getQuery()
            ->getResult();
    }
/*
    /**
     * @return Book[]
     */
/*    public function getPriceComparison()
    {
        return $this->findBy([], ['price' => 'ASC']);
    }
//    /**
//     * @return Book[] Returns an array of Book objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Book
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
