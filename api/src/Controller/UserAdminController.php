<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/users')]
#[IsGranted('ROLE_SUPER_ADMIN')]
class UserAdminController extends AbstractController
{
    #[Route('/', name: 'admin_users')]
    public function index(UserRepository $repo): Response
    {
        return $this->render('admin/users.html.twig', [
            'users' => $repo->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_user_new')]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher
    ): Response {
        $user = new User();
        $form = $this->createForm(UserType::class, $user, ['is_edit' => false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Mot de passe seulement si le champ existe ET est renseigné
            $plain = $form->has('plainPassword') ? $form->get('plainPassword')->getData() : null;
            if ($plain) {
                $user->setPassword($hasher->hashPassword($user, $plain));
            }

            // Rôle par défaut si aucun rôle n'a été défini
            if (!$user->getRoles() || count($user->getRoles()) === 0) {
                $user->setRoles(['ROLE_EDITOR']);
            }

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Utilisateur créé.');
            return $this->redirectToRoute('admin_users');
        }

        return $this->render('admin/user_form.html.twig', [
            'form' => $form->createView(),
            'is_edit' => false,
        ]);
    }

    #[Route('/edit/{id}', name: 'admin_user_edit')]
    public function edit(
        User $user,
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher
    ): Response {
        $form = $this->createForm(UserType::class, $user, ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Mot de passe seulement si le champ existe ET est renseigné
            $plain = $form->has('plainPassword') ? $form->get('plainPassword')->getData() : null;
            if ($plain) {
                $user->setPassword($hasher->hashPassword($user, $plain));
            }

            $em->flush();

            $this->addFlash('success', 'Utilisateur mis à jour.');
            return $this->redirectToRoute('admin_users');
        }

        return $this->render('admin/user_form.html.twig', [
            'form' => $form->createView(),
            'is_edit' => true,
        ]);
    }

    #[Route('/delete/{id}', name: 'admin_user_delete', methods: ['POST'])]
    public function delete(
        User $user,
        EntityManagerInterface $em,
        Request $request,
        UserRepository $repo
    ): Response {
        if (!$this->isCsrfTokenValid('delete_user_' . $user->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        // Sécurité: éviter de supprimer son propre compte
        if ($this->getUser() && $user->getId() === $this->getUser()->getId()) {
            $this->addFlash('error', 'Impossible de supprimer votre propre compte.');
            return $this->redirectToRoute('admin_users');
        }

        // Sécurité: ne pas supprimer le DERNIER SUPER_ADMIN
        $isTargetSuperAdmin = in_array('ROLE_SUPER_ADMIN', $user->getRoles(), true);
        if ($isTargetSuperAdmin) {
            $superAdmins = array_filter($repo->findAll(), fn(User $u) =>
                in_array('ROLE_SUPER_ADMIN', $u->getRoles(), true)
            );
            if (count($superAdmins) <= 1) {
                $this->addFlash('error', 'Impossible de supprimer le dernier SUPER ADMIN.');
                return $this->redirectToRoute('admin_users');
            }
        }

        $em->remove($user);
        $em->flush();

        $this->addFlash('success', 'Utilisateur supprimé.');
        return $this->redirectToRoute('admin_users');
    }
}
