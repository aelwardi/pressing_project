<?php

namespace App\Entity;

use App\Enum\OrderStatusEnum;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column]
    private ?float $totalPrice = null;

    #[ORM\Column(length: 255)]
    private ?string $paymentMethod = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $expectedDeliveryDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $actualDeliveryDate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $fullAddress = null;

    #[ORM\ManyToOne(inversedBy: 'order')]
    private ?User $user = null;

    /**
     * @var Collection<int, OrderItem>
     */
    #[ORM\OneToMany(targetEntity: OrderItem::class, mappedBy: 'order')]
    private Collection $orderItem;

    /**
     * @var Collection<int, OrderReceipt>
     */
    #[ORM\OneToMany(targetEntity: OrderReceipt::class, mappedBy: 'order')]
    private Collection $orderReceipt;

    #[ORM\Column(enumType: OrderStatusEnum::class)]
    private ?OrderStatusEnum $status = null;

    public function __construct()
    {
        $this->orderItem = new ArrayCollection();
        $this->orderReceipt = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): static
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): static
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getExpectedDeliveryDate(): ?\DateTimeInterface
    {
        return $this->expectedDeliveryDate;
    }

    public function setExpectedDeliveryDate(\DateTimeInterface $expectedDeliveryDate): static
    {
        $this->expectedDeliveryDate = $expectedDeliveryDate;

        return $this;
    }

    public function getActualDeliveryDate(): ?\DateTimeInterface
    {
        return $this->actualDeliveryDate;
    }

    public function setActualDeliveryDate(\DateTimeInterface $actualDeliveryDate): static
    {
        $this->actualDeliveryDate = $actualDeliveryDate;

        return $this;
    }

    public function getFullAddress(): ?string
    {
        return $this->fullAddress;
    }

    public function setFullAddress(string $fullAddress): static
    {
        $this->fullAddress = $fullAddress;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, OrderItem>
     */
    public function getOrderItem(): Collection
    {
        return $this->orderItem;
    }

    public function addOrderItem(OrderItem $orderItem): static
    {
        if (!$this->orderItem->contains($orderItem)) {
            $this->orderItem->add($orderItem);
            $orderItem->setOrder($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): static
    {
        if ($this->orderItem->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getOrder() === $this) {
                $orderItem->setOrder(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, OrderReceipt>
     */
    public function getOrderReceipt(): Collection
    {
        return $this->orderReceipt;
    }

    public function addOrderReceipt(OrderReceipt $orderReceipt): static
    {
        if (!$this->orderReceipt->contains($orderReceipt)) {
            $this->orderReceipt->add($orderReceipt);
            $orderReceipt->setOrder($this);
        }

        return $this;
    }

    public function removeOrderReceipt(OrderReceipt $orderReceipt): static
    {
        if ($this->orderReceipt->removeElement($orderReceipt)) {
            // set the owning side to null (unless already changed)
            if ($orderReceipt->getOrder() === $this) {
                $orderReceipt->setOrder(null);
            }
        }

        return $this;
    }

    public function getStatus(): ?OrderStatusEnum
    {
        return $this->status;
    }

    public function setStatus(OrderStatusEnum $status): static
    {
        $this->status = $status;

        return $this;
    }
}
