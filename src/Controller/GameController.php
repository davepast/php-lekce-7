<?php

namespace App\Controller;

use App\Entity\GameResults;
use App\Repository\GameResultsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game_index")
     */
    public function index(GameResultsRepository $gameResultsRepository)
    {
        if (!$gameResult = $gameResultsRepository->find(1)) {
            return $this->render('game/index.html.twig', [
                'gameResult' => ['result' => 0]
            ]);
        } else {
            return $this->render('game/index.html.twig', [
                'gameResult' => $gameResult
            ]);
        }
    }

    /**
     * @Route("/game/modify/{id}", name="game_modify")
     */
    public function modify(int $id, GameResultsRepository $gameResultsRepository)
    {
        if (abs($id) > 100) {
            if($id > 100) {
                $id = 100;
            } else {
                $id = -100;
            }
        }

        $gameResults = $gameResultsRepository->find(1);
        $gameResults->setResult($gameResults->getResult() + $id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($gameResults);
        $entityManager->flush();

        return $this->redirectToRoute('game_index');
    }
}

