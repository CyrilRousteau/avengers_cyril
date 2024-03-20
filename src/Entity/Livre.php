<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[Assert\NotBlank]
    #[Assert\Type("\DateTime")]
    #[Assert\Choice(
        choices : [ "fiction", "non-fiction" ],
        message : "Ecrivez un titre."
        )]
    #[Assert\Length(min: 3)]
    #[Assert\NegativeOrZero]
    #[Assert\Range(
        min : 3,
        max : 180,
        notInRangeMessage: "La valeur doit être entre {{ min }} et {{ max }}.",
    )]
    private $Livre;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_publication = null;

    #[ORM\ManyToOne(targetEntity:"App\Entity\Auteur", inversedBy: "livres")]
    #[Assert\Type(type:"App\Entity\Auteur")]
    #[Assert\Valid]
    private $auteur;

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

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->date_publication;
    }

    public function setDatePublication(?\DateTimeInterface $date_publication): static
    {
        $this->date_publication = $date_publication;

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
