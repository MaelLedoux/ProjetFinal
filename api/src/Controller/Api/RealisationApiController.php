<?php

namespace App\Controller\Api;

use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class RealisationApiController extends AbstractController
{
    #[Route('/realisations/{type}', name: 'api_realisations_by_type', methods: ['GET'])]
    public function getByType(string $type, RealisationRepository $repo): JsonResponse
    {
        $realisations = $repo->findBy(['type' => $type], ['createdAt' => 'DESC']);

        $data = [];
        foreach ($realisations as $r) {
            $data[] = [
                'id' => $r->getId(),
                'image' => '/images/' . $r->getImage(),
                'description' => $r->getDescription(),
            ];
        }

        return $this->json($data);
    }
}
