<?php

namespace App\Service;

use App\Entity\PortfolioProject;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\KernelInterface;
use Twig\Environment;

class ProjectHtmlGenerator
{
    private Environment $twig;
    private string $projectDir;

    public function __construct(Environment $twig, KernelInterface $kernel)
    {
        $this->twig = $twig;
        $this->projectDir = $kernel->getProjectDir();
    }

    public function generateHtml(PortfolioProject $project): string
    {
        $filesystem = new Filesystem();
        $htmlContent = $this->twig->render('generated/project_template.html.twig', [
            'titre' => $project->getTitre(),
            'description' => $project->getContenuHtml(),
            'images' => $project->getImagesAnnexes() ?? [$project->getImagePrincipale()],
        ]);

        $filename = 'projet' . $project->getId() . '.html';
        $publicPath = $this->projectDir . '/public/projets/' . $filename;

        $filesystem->dumpFile($publicPath, $htmlContent);

        return 'projets/' . $filename;
    }
}
