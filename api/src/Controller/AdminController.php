<?php

namespace App\Controller;

use App\Entity\PortfolioProject;
use App\Form\PortfolioProjectType;
use App\Repository\ContactMessageRepository;
use App\Repository\PortfolioProjectRepository;
use App\Repository\ServiceRepository;
use App\Service\ProjectHtmlGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_EDITOR')] // Tout le controller est réservé aux éditeurs
class AdminController extends AbstractController
{
    // Dashboard (OK pour éditeur)
    #[Route('/dashboard', name: 'admin_dashboard')]
    public function dashboard(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    // Messages (ADMIN uniquement)
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/messages', name: 'admin_messages')]
    public function messages(ContactMessageRepository $repo): Response
    {
        $messages = $repo->findBy([], ['createdAt' => 'DESC']);
        return $this->render('admin/messages.html.twig', [
            'messages' => $messages,
        ]);
    }

    // Suppression d'un message (ADMIN uniquement)
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/messages/delete/{id}', name: 'admin_message_delete', methods: ['POST'])]
    public function deleteMessage(int $id, ContactMessageRepository $repo, EntityManagerInterface $em): RedirectResponse
    {
        $message = $repo->find($id);
        if ($message) {
            $em->remove($message);
            $em->flush();
            $this->addFlash('success', 'Message supprimé.');
        }

        return $this->redirectToRoute('admin_messages');
    }

    // Liste des projets (OK pour éditeur)
    #[Route('/projects', name: 'admin_projects')]
    public function projects(PortfolioProjectRepository $repo, ParameterBagInterface $params): Response
    {
        $projects = $repo->findAll();
        $frontendUrl = $params->get('frontend_url');

        return $this->render('admin/projects.html.twig', [
            'projects' => $projects,
            'frontend_url' => $frontendUrl,
        ]);
    }

    // Ajouter projet (OK pour éditeur)
    #[Route('/projects/add', name: 'admin_project_add')]
    public function addProject(Request $request, EntityManagerInterface $em, ProjectHtmlGenerator $generator, ParameterBagInterface $params): Response
    {
        $project = new PortfolioProject();
        $form = $this->createForm(PortfolioProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $mainImage = $form->get('imagePrincipale')->getData();
            if ($mainImage) {
                $newFilename = uniqid('main_') . '.' . $mainImage->guessExtension();
                $mainImage->move($params->get('kernel.project_dir') . '/public/images', $newFilename);
                $project->setImagePrincipale('images/' . $newFilename);
            }

            $annexImages = $form->get('imagesAnnexes')->getData();
            $imagePaths = [];
            if ($annexImages) {
                foreach ($annexImages as $file) {
                    $fileName = uniqid('img_') . '.' . $file->guessExtension();
                    $file->move($params->get('kernel.project_dir') . '/public/images', $fileName);
                    $imagePaths[] = 'images/' . $fileName;
                }
                $project->setImagesAnnexes($imagePaths);
            }

            $em->persist($project);
            $em->flush();

            $lien = $generator->generateHtml($project);
            $project->setLien($lien);
            $em->flush();

            $this->addFlash('success', 'Projet ajouté avec succès.');
            return $this->redirectToRoute('admin_projects');
        }

        return $this->render('admin/project_form.html.twig', [
            'form' => $form->createView(),
            'is_edit' => false,
        ]);
    }

    // Modifier projet (OK pour éditeur)
    #[Route('/projects/edit/{id}', name: 'admin_project_edit')]
    public function editProject(int $id, Request $request, PortfolioProjectRepository $repo, EntityManagerInterface $em, ProjectHtmlGenerator $generator, ParameterBagInterface $params): Response
    {
        $project = $repo->find($id);
        if (!$project) {
            throw $this->createNotFoundException('Projet non trouvé');
        }

        $form = $this->createForm(PortfolioProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $mainImage = $form->get('imagePrincipale')->getData();
            if ($mainImage) {
                $newFilename = uniqid('main_') . '.' . $mainImage->guessExtension();
                $mainImage->move($params->get('kernel.project_dir') . '/public/images', $newFilename);
                $project->setImagePrincipale('images/' . $newFilename);
            }

            $annexImages = $form->get('imagesAnnexes')->getData();
            $imagePaths = [];
            if ($annexImages) {
                foreach ($annexImages as $file) {
                    $fileName = uniqid('img_') . '.' . $file->guessExtension();
                    $file->move($params->get('kernel.project_dir') . '/public/images', $fileName);
                    $imagePaths[] = 'images/' . $fileName;
                }
                $project->setImagesAnnexes($imagePaths);
            }

            $em->flush();
            $generator->generateHtml($project);

            $this->addFlash('success', 'Projet modifié avec succès.');
            return $this->redirectToRoute('admin_projects');
        }

        return $this->render('admin/project_form.html.twig', [
            'form' => $form->createView(),
            'is_edit' => true,
        ]);
    }

    // Supprimer projet (ADMIN seulement)
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/projects/delete/{id}', name: 'admin_project_delete', methods: ['POST'])]
    public function deleteProject(int $id, PortfolioProjectRepository $repo, EntityManagerInterface $em): RedirectResponse
    {
        $project = $repo->find($id);
        if ($project) {
            $em->remove($project);
            $em->flush();
            $this->addFlash('success', 'Projet supprimé.');
        }

        return $this->redirectToRoute('admin_projects');
    }

    // Services (OK pour éditeur)
    #[Route('/services', name: 'admin_services')]
    public function services(ServiceRepository $serviceRepository, ParameterBagInterface $params): Response
    {
        $services = $serviceRepository->findAll();
        $frontendUrl = $params->get('frontend_url');

        return $this->render('admin/services.html.twig', [
            'services' => $services,
            'frontend_url' => $frontendUrl,
        ]);
    }
}
