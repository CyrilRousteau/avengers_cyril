<?php

namespace App\Entity;

use App\Repository\MotsClesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MotsClesRepository::class)]
class MotsCles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: MarquePage::class, inversedBy: 'motsCles')]
    private Collection $marque_page;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    public function __construct()
    {
        $this->marque_page = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, MarquePage>
     */
    public function getMarquePage(): Collection
    {
        return $this->marque_page;
    }

    public function addMarquePage(MarquePage $marquePage): static
    {
        if (!$this->marque_page->contains($marquePage)) {
            $this->marque_page->add($marquePage);
        }

        return $this;
    }

    public function removeMarquePage(MarquePage $marquePage): static
    {
        $this->marque_page->removeElement($marquePage);

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }
}
