<?php

namespace App\Command;

use App\Entity\PortfolioProject;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

#[AsCommand(
    name: 'import:projects',
    description: 'Importe les projets HTML depuis /public/projets vers la base de données.'
)]
class ImportProjectsCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly ParameterBagInterface $params
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $projetsPath = dirname($this->params->get('kernel.project_dir')) . '/public/projets/';
        $fichiers = glob($projetsPath . 'projet*.html');

        if (empty($fichiers)) {
            $output->writeln('❌ Aucun fichier projet*.html trouvé.');
            return Command::FAILURE;
        }

        $importes = 0;

        foreach ($fichiers as $fichier) {
            $html = file_get_contents($fichier);
            $dom = new \DOMDocument();
            @$dom->loadHTML($html);

            $titre = $dom->getElementsByTagName('h2')->item(0)?->nodeValue ?? 'Titre non trouvé';
            $contenuHtml = '';
            $section = $dom->getElementsByTagName('section')->item(0);
            if ($section) {
                foreach ($section->getElementsByTagName('div') as $div) {
                    if ($div->getAttribute('class') === 'text-wrapper') {
                        $contenuHtml = $dom->saveHTML($div);
                        break;
                    }
                }
            }

            $img = $dom->getElementsByTagName('img')->item(0)?->getAttribute('src') ?? '';
            $imagePrincipale = ltrim($img, '/');

            $projet = new PortfolioProject();
            $projet->setTitre($titre);
            $projet->setContenuHtml($contenuHtml);
            $projet->setImagePrincipale($imagePrincipale);
            $projet->setLien('projets/' . basename($fichier));

            $this->em->persist($projet);
            $importes++;
            $output->writeln("✅ Importé : " . basename($fichier));
        }

        $this->em->flush();
        $output->writeln("\n🎉 $importes projet(s) importé(s) avec succès !");
        return Command::SUCCESS;
    }
}
