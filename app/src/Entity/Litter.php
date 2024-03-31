<?php

namespace App\Entity;

use App\Repository\LitterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LitterRepository::class)]
class Litter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\Column]
    private ?int $numberPuppies = null;

    #[ORM\Column]
    private ?int $numberMale = null;

    #[ORM\Column]
    private ?int $numberFemale = null;

    #[ORM\Column(length: 255)]
    private ?string $lofNumber = null;

    #[ORM\Column]
    private ?bool $isEnable = null;

    #[ORM\ManyToOne(inversedBy: 'Litter')]
    private ?Repro $repro = null;

    #[ORM\OneToMany(mappedBy: 'Litter', targetEntity: Puppy::class)]
    private Collection $puppies;

    public function __construct()
    {
        $this->puppies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getNumberPuppies(): ?int
    {
        return $this->numberPuppies;
    }

    public function setNumberPuppies(int $numberPuppies): static
    {
        $this->numberPuppies = $numberPuppies;

        return $this;
    }

    public function getNumberMale(): ?int
    {
        return $this->numberMale;
    }

    public function setNumberMale(int $numberMale): static
    {
        $this->numberMale = $numberMale;

        return $this;
    }

    public function getNumberFemale(): ?int
    {
        return $this->numberFemale;
    }

    public function setNumberFemale(int $numberFemale): static
    {
        $this->numberFemale = $numberFemale;

        return $this;
    }

    public function getLofNumber(): ?string
    {
        return $this->lofNumber;
    }

    public function setLofNumber(string $lofNumber): static
    {
        $this->lofNumber = $lofNumber;

        return $this;
    }

    public function isIsEnable(): ?bool
    {
        return $this->isEnable;
    }

    public function setIsEnable(bool $isEnable): static
    {
        $this->isEnable = $isEnable;

        return $this;
    }

    public function getRepro(): ?Repro
    {
        return $this->repro;
    }

    public function setRepro(?Repro $repro): static
    {
        $this->repro = $repro;

        return $this;
    }

    /**
     * @return Collection<int, Puppy>
     */
    public function getPuppies(): Collection
    {
        return $this->puppies;
    }

    public function addPuppy(Puppy $puppy): static
    {
        if (!$this->puppies->contains($puppy)) {
            $this->puppies->add($puppy);
            $puppy->setLitter($this);
        }

        return $this;
    }

    public function removePuppy(Puppy $puppy): static
    {
        if ($this->puppies->removeElement($puppy)) {
            // set the owning side to null (unless already changed)
            if ($puppy->getLitter() === $this) {
                $puppy->setLitter(null);
            }
        }

        return $this;
    }
}
