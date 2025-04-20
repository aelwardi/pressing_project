<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $supplierName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $purchasePrice = null;

    #[ORM\Column]
    private ?float $salePrice = null;

    #[ORM\Column]
    private ?int $stockQuantity = null;

    #[ORM\ManyToOne(inversedBy: 'product')]
    private ?Pressing $pressing = null;

    /**
     * @var Collection<int, MediaFile>
     */
    #[ORM\OneToMany(targetEntity: MediaFile::class, mappedBy: 'product')]
    private Collection $mediaFile;

    public function __construct()
    {
        $this->mediaFile = new ArrayCollection();
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

    public function getSupplierName(): ?string
    {
        return $this->supplierName;
    }

    public function setSupplierName(string $supplierName): static
    {
        $this->supplierName = $supplierName;

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

    public function getPurchasePrice(): ?float
    {
        return $this->purchasePrice;
    }

    public function setPurchasePrice(float $purchasePrice): static
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    public function getSalePrice(): ?float
    {
        return $this->salePrice;
    }

    public function setSalePrice(float $salePrice): static
    {
        $this->salePrice = $salePrice;

        return $this;
    }

    public function getStockQuantity(): ?int
    {
        return $this->stockQuantity;
    }

    public function setStockQuantity(int $stockQuantity): static
    {
        $this->stockQuantity = $stockQuantity;

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
            $mediaFile->setProduct($this);
        }

        return $this;
    }

    public function removeMediaFile(MediaFile $mediaFile): static
    {
        if ($this->mediaFile->removeElement($mediaFile)) {
            // set the owning side to null (unless already changed)
            if ($mediaFile->getProduct() === $this) {
                $mediaFile->setProduct(null);
            }
        }

        return $this;
    }
}
