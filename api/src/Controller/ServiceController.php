<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/services')]
#[IsGranted('ROLE_EDITOR')] // Le CM peut consulter/éditer les services
class ServiceController extends AbstractController
{
    #[Route('/', name: 'admin_services', methods: ['GET'])]
    public function index(ServiceRepository $serviceRepository): Response
    {
        $services = $serviceRepository->findAll();

        return $this->render('admin/services.html.twig', [
            'services' => $services,
        ]);
    }
}
