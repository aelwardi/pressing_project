<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'service')]
    private ?Category $category = null;

    /**
     * @var Collection<int, MediaFile>
     */
    #[ORM\OneToMany(targetEntity: MediaFile::class, mappedBy: 'service')]
    private Collection $mediaFile;

    /**
     * @var Collection<int, Promotion>
     */
    #[ORM\OneToMany(targetEntity: Promotion::class, mappedBy: 'service')]
    private Collection $promotion;

    public function __construct()
    {
        $this->mediaFile = new ArrayCollection();
        $this->promotion = new ArrayCollection();
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

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
            $mediaFile->setService($this);
        }

        return $this;
    }

    public function removeMediaFile(MediaFile $mediaFile): static
    {
        if ($this->mediaFile->removeElement($mediaFile)) {
            // set the owning side to null (unless already changed)
            if ($mediaFile->getService() === $this) {
                $mediaFile->setService(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotion(): Collection
    {
        return $this->promotion;
    }

    public function addPromotion(Promotion $promotion): static
    {
        if (!$this->promotion->contains($promotion)) {
            $this->promotion->add($promotion);
            $promotion->setService($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): static
    {
        if ($this->promotion->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getService() === $this) {
                $promotion->setService(null);
            }
        }

        return $this;
    }
}
