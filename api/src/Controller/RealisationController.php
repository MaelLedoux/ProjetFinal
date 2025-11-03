<?php

namespace App\Controller;

use App\Entity\Realisation;
use App\Form\RealisationType;
use App\Repository\RealisationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/realisations')]
#[IsGranted('ROLE_EDITOR')] // tout ce contrôleur est accessible aux éditeurs
class RealisationController extends AbstractController
{
    #[Route('/', name: 'admin_realisations', methods: ['GET'])]
    public function index(
        RealisationRepository $repo,
        ParameterBagInterface $params
    ): Response {
        return $this->render('admin/realisations.html.twig', [
            'realisations' => $repo->findBy([], ['createdAt' => 'DESC']),
            'frontend_url' => $params->get('frontend_url'),
        ]);
    }

    #[Route('/add', name: 'admin_realisation_add', methods: ['GET', 'POST'])]
    public function add(
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger
    ): Response {
        $realisation = new Realisation();
        $form = $this->createForm(RealisationType::class, $realisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Upload image
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move($this->getParameter('images_directory'), $newFilename);
                    $realisation->setImage($newFilename);
                } catch (\Throwable $e) {
                    $this->addFlash('error', 'Erreur lors de l’upload de l’image.');
                    return $this->redirectToRoute('admin_realisation_add');
                }
            }

            $em->persist($realisation);
            $em->flush();

            $this->addFlash('success', 'Réalisation ajoutée avec succès !');
            return $this->redirectToRoute('admin_realisations');
        }

        // ⚠️ Ton template s’appelle realisations_form.html.twig (pluriel)
        return $this->render('admin/realisations_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // Suppression : ADMIN uniquement
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/delete/{id}', name: 'admin_realisation_delete', methods: ['POST'])]
    public function delete(
        Realisation $realisation,
        EntityManagerInterface $em,
        Filesystem $fs
    ): RedirectResponse {
        // Supprime le fichier image lié si présent
        if ($realisation->getImage()) {
            $imagePath = $this->getParameter('images_directory').'/'.$realisation->getImage();
            if ($fs->exists($imagePath)) {
                $fs->remove($imagePath);
            }
        }

        $em->remove($realisation);
        $em->flush();

        $this->addFlash('success', 'Réalisation supprimée.');
        return $this->redirectToRoute('admin_realisations');
    }
}
