<?php

namespace App\Controller\Api;

use App\Entity\ContactMessage;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/contact')]
class ContactController extends AbstractController
{
    #[Route('', name: 'api_contact', methods: ['POST'])]
    public function contact(
        Request $request,
        EntityManagerInterface $em,
        MailService $mailService
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (!$data || empty($data['nom']) || empty($data['email']) || empty($data['message'])) {
            return $this->json(['success' => false, 'error' => 'Champs requis manquants'], 400);
        }

        try {
            $contact = new ContactMessage();
            $contact->setName($data['nom']);
            $contact->setEmail($data['email']);
            $contact->setTelephone($data['telephone'] ?? null);
            $contact->setSujet($data['sujet'] ?? null);
            $contact->setMessage($data['message']);
            $em->persist($contact);
            $em->flush();

            $body = "<strong>Nom:</strong> {$data['nom']}<br>" .
                    "<strong>Email:</strong> {$data['email']}<br>" .
                    "<strong>Téléphone:</strong> " . ($data['telephone'] ?? '') . "<br>" .
                    "<strong>Sujet:</strong> " . ($data['sujet'] ?? '') . "<br>" .
                    "<strong>Message:</strong><br>" . nl2br($data['message']);

            $mailService->envoyerMail(
                $data['email'],
                $data['nom'],
                $data['sujet'] ?? 'Formulaire de contact',
                $body
            );

            return $this->json(['success' => true]);
        } catch (\Throwable $e) {
            return $this->json([
                'success' => false,
                'error' => 'Erreur lors de l\'envoi ou enregistrement : ' . $e->getMessage()
            ], 500);
        }
    }
}
