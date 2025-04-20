<?php

namespace App\Entity;

use App\Repository\PressingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PressingRepository::class)]
class Pressing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(length: 255)]
    private ?string $taxNumber = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $siteWeb = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    /**
     * @var Collection<int, Category>
     */
    #[ORM\OneToMany(targetEntity: Category::class, mappedBy: 'pressing')]
    private Collection $category;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'pressing')]
    private Collection $product;

    /**
     * @var Collection<int, Equipment>
     */
    #[ORM\OneToMany(targetEntity: Equipment::class, mappedBy: 'pressing')]
    private Collection $equipment;

    /**
     * @var Collection<int, MediaFile>
     */
    #[ORM\OneToMany(targetEntity: MediaFile::class, mappedBy: 'pressing')]
    private Collection $mediaFile;

    /**
     * @var Collection<int, PaymentMethod>
     */
    #[ORM\OneToMany(targetEntity: PaymentMethod::class, mappedBy: 'pressing')]
    private Collection $paymentMethod;

    /**
     * @var Collection<int, Schedule>
     */
    #[ORM\OneToMany(targetEntity: Schedule::class, mappedBy: 'pressing')]
    private Collection $schedule;

    /**
     * @var Collection<int, Address>
     */
    #[ORM\OneToMany(targetEntity: Address::class, mappedBy: 'pressing')]
    private Collection $address;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'pressing')]
    private Collection $user;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->product = new ArrayCollection();
        $this->equipment = new ArrayCollection();
        $this->mediaFile = new ArrayCollection();
        $this->paymentMethod = new ArrayCollection();
        $this->schedule = new ArrayCollection();
        $this->address = new ArrayCollection();
        $this->usere = new ArrayCollection();
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTaxNumber(): ?string
    {
        return $this->taxNumber;
    }

    public function setTaxNumber(string $taxNumber): static
    {
        $this->taxNumber = $taxNumber;

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

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }

    public function setSiteWeb(string $siteWeb): static
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
            $category->setPressing($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        if ($this->category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getPressing() === $this) {
                $category->setPressing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
            $product->setPressing($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getPressing() === $this) {
                $product->setPressing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipment>
     */
    public function getEquipment(): Collection
    {
        return $this->equipment;
    }

    public function addEquipment(Equipment $equipment): static
    {
        if (!$this->equipment->contains($equipment)) {
            $this->equipment->add($equipment);
            $equipment->setPressing($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): static
    {
        if ($this->equipment->removeElement($equipment)) {
            // set the owning side to null (unless already changed)
            if ($equipment->getPressing() === $this) {
                $equipment->setPressing(null);
            }
        }

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
            $mediaFile->setPressing($this);
        }

        return $this;
    }

    public function removeMediaFile(MediaFile $mediaFile): static
    {
        if ($this->mediaFile->removeElement($mediaFile)) {
            // set the owning side to null (unless already changed)
            if ($mediaFile->getPressing() === $this) {
                $mediaFile->setPressing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PaymentMethod>
     */
    public function getPaymentMethod(): Collection
    {
        return $this->paymentMethod;
    }

    public function addPaymentMethod(PaymentMethod $paymentMethod): static
    {
        if (!$this->paymentMethod->contains($paymentMethod)) {
            $this->paymentMethod->add($paymentMethod);
            $paymentMethod->setPressing($this);
        }

        return $this;
    }

    public function removePaymentMethod(PaymentMethod $paymentMethod): static
    {
        if ($this->paymentMethod->removeElement($paymentMethod)) {
            // set the owning side to null (unless already changed)
            if ($paymentMethod->getPressing() === $this) {
                $paymentMethod->setPressing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Schedule>
     */
    public function getSchedule(): Collection
    {
        return $this->schedule;
    }

    public function addSchedule(Schedule $schedule): static
    {
        if (!$this->schedule->contains($schedule)) {
            $this->schedule->add($schedule);
            $schedule->setPressing($this);
        }

        return $this;
    }

    public function removeSchedule(Schedule $schedule): static
    {
        if ($this->schedule->removeElement($schedule)) {
            // set the owning side to null (unless already changed)
            if ($schedule->getPressing() === $this) {
                $schedule->setPressing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Address>
     */
    public function getAddress(): Collection
    {
        return $this->address;
    }

    public function addAddress(Address $address): static
    {
        if (!$this->address->contains($address)) {
            $this->address->add($address);
            $address->setPressing($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): static
    {
        if ($this->address->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getPressing() === $this) {
                $address->setPressing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): static
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setPressing($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getPressing() === $this) {
                $user->setPressing(null);
            }
        }

        return $this;
    }
}
