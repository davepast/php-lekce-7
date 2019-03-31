<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    /**
     * @Route("/test/detail", name="test_detail")
     */
    public function detail()
    {
        return $this->render('test/detail.html.twig', [
            'controller_name' => 'TestControllerDetail',
            'user' => [
                'username' => 'andrejmaly',
                'password' => 'velicesložitéheslo',
                'name' => 'Andrej Malý',
                'age' => 20
            ]
        ]);
    }

    /**
     * @Route("/test", name="test_index")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/test/{pozdrav}", name="test_hello")
     */
    public function hello($pozdrav)
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => $pozdrav,
        ]);
    }
}
