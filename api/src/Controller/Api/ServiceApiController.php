<?php

namespace App\Controller\Api;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ServiceApiController extends AbstractController
{
    #[Route('/api/services', name: 'api_services', methods: ['GET'])]
    public function index(ServiceRepository $serviceRepository): JsonResponse
    {
        $services = $serviceRepository->findAll();

        $response = [
            'services' => [],
            'videos' => []
        ];

        foreach ($services as $s) {
            $data = [
                'id' => $s->getId(),
                'titre' => $s->getTitre(),
                'description' => $s->getDescription(),
                'icone' => $s->getIcone(),
                'image' => $s->getImage(),
                'video' => $s->getVideo()
            ];

            if ($s->getType() === 'video') {
                $response['videos'][] = $data;
            } else {
                $response['services'][] = $data;
            }
        }

        return $this->json($response);
    }
}
