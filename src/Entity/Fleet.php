<?php

namespace App\Entity;

use App\Repository\FleetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FleetRepository::class)]
class Fleet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Truck $Truck = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Trailer $Trailer = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Driver $Driver = null;

    #[ORM\Column(length: 255)]
    private ?string $Status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTruck(): ?Truck
    {
        return $this->Truck;
    }

    public function setTruck(?Truck $Truck): static
    {
        $this->Truck = $Truck;

        return $this;
    }

    public function getTrailer(): ?Trailer
    {
        return $this->Trailer;
    }

    public function setTrailer(?Trailer $Trailer): static
    {
        $this->Trailer = $Trailer;

        return $this;
    }

    public function getDriver(): ?Driver
    {
        return $this->Driver;
    }

    public function setDriver(?Driver $Driver): static
    {
        $this->Driver = $Driver;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): static
    {
        $this->Status = $Status;

        return $this;
    }
}
