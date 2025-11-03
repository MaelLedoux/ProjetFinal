<?php

namespace App\Form;

use App\Entity\PortfolioProject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class PortfolioProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre du projet'
            ])
            ->add('imagePrincipale', FileType::class, [
                'label' => 'Image principale',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg', 'image/png', 'image/webp'
                        ],
                        'mimeTypesMessage' => 'Merci de choisir une image valide (jpg, png, webp)'
                    ])
                ],
            ])
            ->add('imagesAnnexes', FileType::class, [
                'label' => 'Images annexes',
                'mapped' => false,
                'required' => false,
                'multiple' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg', 'image/png', 'image/webp'
                        ],
                        'mimeTypesMessage' => 'Merci de choisir uniquement des images valides.'
                    ])
                ],
            ])
            ->add('contenuHtml', TextareaType::class, [
                'label' => 'Contenu du projet',
                'attr' => [
                    'class' => 'wysiwyg',
                    'rows' => 15,
                    'placeholder' => 'Ajoutez vos titres (h2) et paragraphes (p)...'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PortfolioProject::class,
        ]);
    }
}
