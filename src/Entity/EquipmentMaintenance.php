<?php

namespace App\Entity;

use App\Repository\EquipmentMaintenanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentMaintenanceRepository::class)]
class EquipmentMaintenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $maintenanceType = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $maintenanceDate = null;

    #[ORM\Column(length: 255)]
    private ?string $technicianName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $cost = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $nextMaintenance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reportPDF = null;

    #[ORM\ManyToOne(inversedBy: 'equipmentMaintenance')]
    private ?Equipment $equipment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaintenanceType(): ?string
    {
        return $this->maintenanceType;
    }

    public function setMaintenanceType(string $maintenanceType): static
    {
        $this->maintenanceType = $maintenanceType;

        return $this;
    }

    public function getMaintenanceDate(): ?\DateTimeInterface
    {
        return $this->maintenanceDate;
    }

    public function setMaintenanceDate(\DateTimeInterface $maintenanceDate): static
    {
        $this->maintenanceDate = $maintenanceDate;

        return $this;
    }

    public function getTechnicianName(): ?string
    {
        return $this->technicianName;
    }

    public function setTechnicianName(string $technicianName): static
    {
        $this->technicianName = $technicianName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCost(): ?float
    {
        return $this->cost;
    }

    public function setCost(float $cost): static
    {
        $this->cost = $cost;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getNextMaintenance(): ?\DateTimeInterface
    {
        return $this->nextMaintenance;
    }

    public function setNextMaintenance(\DateTimeInterface $nextMaintenance): static
    {
        $this->nextMaintenance = $nextMaintenance;

        return $this;
    }

    public function getReportPDF(): ?string
    {
        return $this->reportPDF;
    }

    public function setReportPDF(?string $reportPDF): static
    {
        $this->reportPDF = $reportPDF;

        return $this;
    }

    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    public function setEquipment(?Equipment $equipment): static
    {
        $this->equipment = $equipment;

        return $this;
    }
}
