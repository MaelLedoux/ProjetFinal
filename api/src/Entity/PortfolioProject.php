<?php

namespace App\Entity;

use App\Repository\PortfolioProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortfolioProjectRepository::class)]
class PortfolioProject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $titre;

    #[ORM\Column(length: 255)]
    private string $imagePrincipale;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $imagesAnnexes = [];

    #[ORM\Column(type: "text")]
    private string $contenuHtml;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $categorie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien = null;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int { return $this->id; }
    public function getTitre(): string { return $this->titre; }
    public function setTitre(string $titre): void { $this->titre = $titre; }

    public function getImagePrincipale(): string { return $this->imagePrincipale; }
    public function setImagePrincipale(string $imagePrincipale): void { $this->imagePrincipale = $imagePrincipale; }

    public function getImagesAnnexes(): array { return $this->imagesAnnexes ?? []; }
    public function setImagesAnnexes(array $imagesAnnexes): void { $this->imagesAnnexes = $imagesAnnexes; }

    public function getContenuHtml(): string { return $this->contenuHtml; }
    public function setContenuHtml(string $contenuHtml): void { $this->contenuHtml = $contenuHtml; }

    public function getCategorie(): ?string { return $this->categorie; }
    public function setCategorie(?string $categorie): void { $this->categorie = $categorie; }

    public function getLien(): ?string { return $this->lien; }
    public function setLien(?string $lien): void { $this->lien = $lien; }

    public function getCreatedAt(): \DateTimeInterface { return $this->createdAt; }
}
