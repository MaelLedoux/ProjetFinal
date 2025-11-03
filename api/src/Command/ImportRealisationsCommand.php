<?php

namespace App\Command;

use App\Entity\Realisation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:import-realisations',
    description: 'Importe les réalisations de dessins et maquettes en base de données.',
)]
class ImportRealisationsCommand extends Command
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $data = [
            // --- DESSINS ---
            ['d-p1.jpg', 'Peinture acrylique', 'dessin'],
            ['d-p2.jpg', 'Peinture acrylique', 'dessin'],
            ['d-p3.jpg', 'Stylo noir à pointe fine', 'dessin'],
            ['d-p4.jpg', 'Crayon à papier', 'dessin'],
            ['d-p5.png', 'Stylo noir à pointe fine et aquarelle', 'dessin'],
            ['d-p6.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p7.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p8.jpg', 'Stylo noir à pointe fine', 'dessin'],
            ['d-p9.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p10.jpg', 'Stylo noir à pointe fine', 'dessin'],
            ['d-p11.jpg', 'Aquarelle', 'dessin'],
            ['d-p12.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p13.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p14.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p15.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p16.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p17.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p18.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p19.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p20.jpg', 'Feutres à alcool', 'dessin'],
            ['d-p21.png', 'Feutres à alcool', 'dessin'],
            ['d-p22.jpg', 'Aquarelle', 'dessin'],
            ['d-p23.jpg', 'Peinture acrylique', 'dessin'],
            ['d-p24.jpg', 'Aquarelle', 'dessin'],
            ['d-p25.jpg', 'Stylo noir pointe fine', 'dessin'],
            ['d-p26.jpg', 'Stylo noir pointe fine', 'dessin'],
            ['d-p27.jpg', 'Peinture acrylique', 'dessin'],
            ['d-p28.jpg', 'Peinture acrylique', 'dessin'],
            ['d-p29.jpg', 'Stylo noir pointe fine', 'dessin'],
            ['d-p30.jpg', 'Crayon à papier', 'dessin'],
            ['d-p31.jpg', 'Crayon à papier', 'dessin'],
            ['d-p32.jpg', 'Crayon à papier', 'dessin'],
            // --- MAQUETTES ---
            ['maquette1.jpg', '', 'maquette'],
            ['maquette2.jpg', '', 'maquette'],
            ['maquette3.jpg', '', 'maquette'],
            ['maquette4.jpg', '', 'maquette'],
            ['maquette5.jpg', '', 'maquette'],
            ['maquette6.jpg', '', 'maquette'],
            ['maquette7.jpg', '', 'maquette'],
            ['maquette8.jpg', '', 'maquette'],
            ['maquette9.jpg', '', 'maquette'],
            ['maquette10.jpg', '', 'maquette'],
            ['maquette11.jpg', '', 'maquette'],
            ['maquette12.png', '', 'maquette'],
            ['maquette13.png', '', 'maquette'],
            ['maquette14.jpg', '', 'maquette'],
            ['maquette15.jpg', '', 'maquette'],
            ['maquette16.jpg', '', 'maquette'],
            ['maquette17.jpg', '', 'maquette'],
            ['maquette18.jpg', '', 'maquette'],
            ['maquette19.png', '', 'maquette'],
            ['maquette20.png', '', 'maquette'],
            ['maquette21.png', '', 'maquette'],
            ['maquette22.png', '', 'maquette'],
        ];

        foreach ($data as [$image, $description, $type]) {
            $realisation = new Realisation();
            $realisation->setImage($image);
            $realisation->setDescription($description ?: 'Maquette');
            $realisation->setType($type);
            $realisation->setCreatedAt(new \DateTimeImmutable());

            $this->em->persist($realisation);
        }

        $this->em->flush();
        $output->writeln('<info>Toutes les réalisations ont été importées avec succès !</info>');

        return Command::SUCCESS;
    }
}
