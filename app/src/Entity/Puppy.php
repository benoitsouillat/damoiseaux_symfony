<?php

namespace App\Entity;

use App\Repository\PuppyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PuppyRepository::class)]
class Puppy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    private ?string $priority = null;

    #[ORM\ManyToOne(inversedBy: 'puppies')]
    private ?Litter $Litter = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): static
    {
        $this->priority = $priority;

        return $this;
    }

    public function getLitter(): ?Litter
    {
        return $this->Litter;
    }

    public function setLitter(?Litter $Litter): static
    {
        $this->Litter = $Litter;

        return $this;
    }
}
