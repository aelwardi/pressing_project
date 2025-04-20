<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentRepository::class)]
class Equipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $purchasePrice = null;

    #[ORM\Column(length: 255)]
    private ?string $supplierName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $purchaseDate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\ManyToOne(inversedBy: 'equipment')]
    private ?Pressing $pressing = null;

    /**
     * @var Collection<int, MediaFile>
     */
    #[ORM\OneToMany(targetEntity: MediaFile::class, mappedBy: 'equipment')]
    private Collection $mediaFile;

    /**
     * @var Collection<int, EquipmentMaintenance>
     */
    #[ORM\OneToMany(targetEntity: EquipmentMaintenance::class, mappedBy: 'equipment')]
    private Collection $equipmentMaintenance;

    public function __construct()
    {
        $this->mediaFile = new ArrayCollection();
        $this->equipmentMaintenance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPurchasePrice(): ?float
    {
        return $this->purchasePrice;
    }

    public function setPurchasePrice(float $purchasePrice): static
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    public function getSupplierName(): ?string
    {
        return $this->supplierName;
    }

    public function setSupplierName(string $supplierName): static
    {
        $this->supplierName = $supplierName;

        return $this;
    }

    public function getPurchaseDate(): ?\DateTimeInterface
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(\DateTimeInterface $purchaseDate): static
    {
        $this->purchaseDate = $purchaseDate;

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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getPressing(): ?Pressing
    {
        return $this->pressing;
    }

    public function setPressing(?Pressing $pressing): static
    {
        $this->pressing = $pressing;

        return $this;
    }

    /**
     * @return Collection<int, MediaFile>
     */
    public function getMediaFile(): Collection
    {
        return $this->mediaFile;
    }

    public function addMediaFile(MediaFile $mediaFile): static
    {
        if (!$this->mediaFile->contains($mediaFile)) {
            $this->mediaFile->add($mediaFile);
            $mediaFile->setEquipment($this);
        }

        return $this;
    }

    public function removeMediaFile(MediaFile $mediaFile): static
    {
        if ($this->mediaFile->removeElement($mediaFile)) {
            // set the owning side to null (unless already changed)
            if ($mediaFile->getEquipment() === $this) {
                $mediaFile->setEquipment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EquipmentMaintenance>
     */
    public function getEquipmentMaintenance(): Collection
    {
        return $this->equipmentMaintenance;
    }

    public function addEquipmentMaintenance(EquipmentMaintenance $equipmentMaintenance): static
    {
        if (!$this->equipmentMaintenance->contains($equipmentMaintenance)) {
            $this->equipmentMaintenance->add($equipmentMaintenance);
            $equipmentMaintenance->setEquipment($this);
        }

        return $this;
    }

    public function removeEquipmentMaintenance(EquipmentMaintenance $equipmentMaintenance): static
    {
        if ($this->equipmentMaintenance->removeElement($equipmentMaintenance)) {
            // set the owning side to null (unless already changed)
            if ($equipmentMaintenance->getEquipment() === $this) {
                $equipmentMaintenance->setEquipment(null);
            }
        }

        return $this;
    }
}
