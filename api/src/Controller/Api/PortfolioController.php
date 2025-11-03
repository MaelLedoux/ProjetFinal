<?php

namespace App\Controller\Api;

use App\Repository\PortfolioProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/portfolio')]
class PortfolioController extends AbstractController
{
    #[Route('', name: 'api_portfolio', methods: ['GET'])]
    public function getPortfolio(PortfolioProjectRepository $repository): JsonResponse
    {
        $projects = $repository->findAll();
        $data = array_map(fn($p) => [
            'id' => $p->getId(),
            'titre' => $p->getTitre(),
            'description' => $p->getDescription(),
            'image' => $p->getImage(),
            'categorie' => $p->getCategorie(),
            'video' => $p->getVideo(),
            'lien' => $p->getLien()
        ], $projects);

        return $this->json($data);
    }
}
