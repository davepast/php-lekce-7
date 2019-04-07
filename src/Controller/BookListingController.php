<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/book-listing")
 */

class BookListingController extends AbstractController
{
    /**
     * @Route("/century", name="book_century", methods="GET")
     */
    public function century(BookRepository $bookRepository)
    {

        return $this->render('book_listing/century.html.twig', [
            'booksTill1900' => $bookRepository->getBooksByCenturies(0,1899),
            'books1900To2000' => $bookRepository->getBooksByCenturies(1900, 1999),
            'books2000ToNow' => $bookRepository->getBooksByCenturies(2000, 9999)
        ]);
    }

    /**
     * @Route("/author", name="book_author", methods="GET")
     */
    public function author(BookRepository $bookRepository)
    {
        return $this->render('book_listing/author.html.twig', [
            'authors' => $bookRepository->getAuthors(),
            'books' => $bookRepository->getAllBooks()
        ]);
    }

    /**
     * @Route("/price", name="book_price", methods="GET")
     */
    public function price(BookRepository $bookRepository)
    {
        return $this->render('book_listing/price.html.twig', [
            'books' => $bookRepository->getBooksByPrice()
    ]);
    }

    /**
     * @Route("/new", name="book_new", methods="GET")
     */
    public function new(BookRepository $bookRepository)
    {
        return $this->render('book_listing/new.html.twig', [
            'books' => $bookRepository->getNewBooks()
        ]);
    }
}
