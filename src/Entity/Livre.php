<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(nullable: true)]
    private ?int $annee_parution = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombre_page = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    private ?Auteur $auteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAnneeParution(): ?int
    {
        return $this->annee_parution;
    }

    public function setAnneeParution(?int $annee_parution): static
    {
        $this->annee_parution = $annee_parution;

        return $this;
    }

    public function getNombrePage(): ?int
    {
        return $this->nombre_page;
    }

    public function setNombrePage(?int $nombre_page): static
    {
        $this->nombre_page = $nombre_page;

        return $this;
    }

    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }

    public function setAuteur(?Auteur $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }
}
