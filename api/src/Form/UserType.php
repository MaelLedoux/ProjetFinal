<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Identifiant / Nom affiché',
            ]);

        $builder->add('roles', ChoiceType::class, [
            'label'    => 'Rôles',
            'choices'  => [
                'Super Admin' => 'ROLE_SUPER_ADMIN',
                'Administrateur' => 'ROLE_ADMIN',
                'Éditeur (CM)'   => 'ROLE_EDITOR',
            ],
            'expanded' => true,
            'multiple' => true,
        ]);

        $builder->add('plainPassword', PasswordType::class, [
            'label' => $options['is_edit'] ? 'Nouveau mot de passe (optionnel)' : 'Mot de passe',
            'required' => !$options['is_edit'],
            'mapped' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'is_edit' => false,
        ]);
    }
}
