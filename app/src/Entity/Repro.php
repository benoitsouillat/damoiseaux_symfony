<?php

namespace App\Entity;

use App\Repository\ReproRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReproRepository::class)]
class Repro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $microship = null;

    #[ORM\Column]
    private ?bool $isExterior = null;

    #[ORM\Column]
    private ?bool $isAdn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lofSelect = null;

    #[ORM\OneToMany(mappedBy: 'repro', targetEntity: Litter::class)]
    private Collection $Litter;

    #[ORM\OneToMany(mappedBy: 'repro', targetEntity: Exposition::class)]
    private Collection $Exposition;

    public function __construct()
    {
        $this->Litter = new ArrayCollection();
        $this->Exposition = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMicroship(): ?string
    {
        return $this->microship;
    }

    public function setMicroship(string $microship): static
    {
        $this->microship = $microship;

        return $this;
    }

    public function isIsExterior(): ?bool
    {
        return $this->isExterior;
    }

    public function setIsExterior(bool $isExterior): static
    {
        $this->isExterior = $isExterior;

        return $this;
    }

    public function isIsAdn(): ?bool
    {
        return $this->isAdn;
    }

    public function setIsAdn(bool $isAdn): static
    {
        $this->isAdn = $isAdn;

        return $this;
    }

    public function getLofSelect(): ?string
    {
        return $this->lofSelect;
    }

    public function setLofSelect(?string $lofSelect): static
    {
        $this->lofSelect = $lofSelect;

        return $this;
    }

    /**
     * @return Collection<int, Litter>
     */
    public function getLitter(): Collection
    {
        return $this->Litter;
    }

    public function addLitter(Litter $litter): static
    {
        if (!$this->Litter->contains($litter)) {
            $this->Litter->add($litter);
            $litter->setRepro($this);
        }

        return $this;
    }

    public function removeLitter(Litter $litter): static
    {
        if ($this->Litter->removeElement($litter)) {
            // set the owning side to null (unless already changed)
            if ($litter->getRepro() === $this) {
                $litter->setRepro(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Exposition>
     */
    public function getExposition(): Collection
    {
        return $this->Exposition;
    }

    public function addExposition(Exposition $exposition): static
    {
        if (!$this->Exposition->contains($exposition)) {
            $this->Exposition->add($exposition);
            $exposition->setRepro($this);
        }

        return $this;
    }

    public function removeExposition(Exposition $exposition): static
    {
        if ($this->Exposition->removeElement($exposition)) {
            // set the owning side to null (unless already changed)
            if ($exposition->getRepro() === $this) {
                $exposition->setRepro(null);
            }
        }

        return $this;
    }
}
