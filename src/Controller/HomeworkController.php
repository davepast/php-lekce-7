<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/homework")
 */

class HomeworkController extends AbstractController
{
    /**
     * @Route("/index", name="homework_index")
     */
    public function index()
    {
        return $this->render('homework/index.html.twig', [
            'controller_name' => 'Index',
            'lekce' => [
                'cislo' => 7,
                'datum' => '2019-03-28'
            ]
        ]);
    }

    /**
     * @Route("/remember", name="homework_remember")
     */
    public function remember()
    {
        return $this->render('homework/remember.html.twig', [
            'controller_name' => 'Remember',
            'lekce' => [
                'cislo' => 7,
                'datum' => '2019-03-28'
            ]

        ]);

    }

    /**
     * @Route("/list", name="homework_list")
     */
    public function list()
    {
        return $this->render('homework/list.html.twig', [
            'controller_name' => 'List',
            'lekce' => [
                'cislo' => 7,
                'datum' => '2019-03-28'
            ],
            'vysledky'=> [[
                    'zak' => 'Karel',
                    'predmet' => 'ČJ',
                    'znamka'  => 4
                ], [
                    'zak' => 'Karel',
                    'predmet'=> 'Matematika',
                    'znamka' => 2
                ], [
                    'zak' => 'Petr',
                    'predmet'=> 'Vlastivěda',
                    'znamka' => 1
                ], [
                    'zak' => 'Anička',
                    'predmet'=> 'Vlastivěda',
                    'znamka' => 2
                ], [
                    'zak' => 'Petra',
                    'predmet'=> 'Dějepis',
                    'znamka' => 4
                ], [
                    'zak' => 'Petr Pan',
                    'predmet'=> 'ZSV',
                    'znamka' => 2

                ]
            ]
        ]);
    }

/**
 * @Route("/pythagoras", name="homework_pythagoras")
 */
    public function pythagoras()
    {
        $a = 3;
        $b = 4;
        $strana = 6;
        $uhel = 60;

        return $this->render('homework/pythagoras.html.twig', [
            'controller_name' => 'Pythagoras',
            'lekce' => [
                'cislo' => 7,
                'datum' => '2019-03-28'
            ],
            'a' => $a,
            'b' => $b,
            'strana' => $strana,
            'uhel' => $uhel,
            'obdelnikObsah' => $a * $b,
            'vyska' => $strana * sin(deg2rad($uhel)),
            'trojuhelnikObsah' => round(($strana * sin(deg2rad($uhel))) * $strana / 2),
            'obdelnikObvod' => 2 * ($a + $b),
            'trojuhelnikObvod' => 3 * $strana,



        ]);
    }
}
