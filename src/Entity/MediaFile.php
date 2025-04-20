<?php

namespace App\Entity;

use App\Enum\MediaTypeEnum;
use App\Repository\MediaFileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaFileRepository::class)]
class MediaFile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaFile')]
    private ?Pressing $pressing = null;

    #[ORM\ManyToOne(inversedBy: 'mediaFile')]
    private ?Product $product = null;

    #[ORM\ManyToOne(inversedBy: 'mediaFile')]
    private ?Equipment $equipment = null;

    #[ORM\ManyToOne(inversedBy: 'mediaFile')]
    private ?Service $service = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(enumType: MediaTypeEnum::class)]
    private ?MediaTypeEnum $mediaType = null;

    #[ORM\Column(length: 255)]
    private ?string $fileURL = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

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

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
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

    public function getMediaType(): ?MediaTypeEnum
    {
        return $this->mediaType;
    }

    public function setMediaType(MediaTypeEnum $mediaType): static
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    public function getFileURL(): ?string
    {
        return $this->fileURL;
    }

    public function setFileURL(string $fileURL): static
    {
        $this->fileURL = $fileURL;

        return $this;
    }
}
