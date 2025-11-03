<?php

namespace App\Command;

use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:import-services')]
class ImportServicesCommand extends Command
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $services = [
            [
                'titre' => 'Esquisses à la main',
                'description' => "Chaque projet débute par un croquis dessiné à la main pour traduire avec sensibilité vos envies, vos goûts et l’identité de votre lieu.",
                'icone' => '🖋️',
                'type' => 'service'
            ],
            [
                'titre' => 'Visualisation 3D réaliste',
                'description' => "Grâce à des vues 3D immersives, vous visualisez votre futur intérieur comme si vous y étiez, avant même le début des travaux.",
                'icone' => '🖥️',
                'type' => 'service'
            ],
            [
                'titre' => 'Accompagnement sur mesure',
                'description' => "Du simple conseil déco à la rénovation complète, je vous accompagne à chaque étape, selon vos besoins et votre budget.",
                'icone' => '🤝',
                'type' => 'service'
            ],
            [
                'titre' => 'Coordination de projet',
                'description' => "Je sélectionne des artisans de confiance et assure la coordination pour garantir un rendu final fidèle à votre vision.",
                'icone' => '🛠️',
                'type' => 'service'
            ],
            [
                'titre' => 'Comment je travaille ?',
                'description' => '',
                'icone' => '',
                'video' => 'videos/presentation.mp4',
                'type' => 'video'
            ],
            [
                'titre' => 'Pourquoi utiliser la réalité virtuelle ?',
                'description' => '',
                'icone' => '',
                'video' => 'https://www.youtube.com/embed/SdcIAT9rV9c?si=KnmihfyjL2ktcYVP&amp;start=628',
                'type' => 'video'
            ]
        ];

        foreach ($services as $data) {
            $s = new Service();
            $s->setTitre($data['titre']);
            $s->setDescription($data['description'] ?? '');
            $s->setIcone($data['icone'] ?? '');
            $s->setVideo($data['video'] ?? null);
            $s->setType($data['type']);
            $this->em->persist($s);
        }

        $this->em->flush();
        $output->writeln('✅ Services et vidéos importés en base.');

        return Command::SUCCESS;
    }
}
