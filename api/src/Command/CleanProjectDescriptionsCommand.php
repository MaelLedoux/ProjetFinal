<?php

namespace App\Command;

use App\Repository\PortfolioProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:clean-project-descriptions',
    description: "Remplace les <br> HTML dans les descriptions de projets par des retours à la ligne pour l'édition."
)]
class CleanProjectDescriptionsCommand extends Command
{
    public function __construct(
        private PortfolioProjectRepository $repository,
        private EntityManagerInterface $em
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $projects = $this->repository->findAll();
        $count = 0;

        foreach ($projects as $project) {
            $description = $project->getDescription();
            if (str_contains($description, '<br')) {
                $cleaned = preg_replace('#<br\s*/?>#i', "\n", $description);
                $project->setDescription($cleaned);
                $count++;
            }
        }

        $this->em->flush();

        $output->writeln("✔ {$count} description(s) nettoyée(s).");
        return Command::SUCCESS;
    }
}
