<?php

namespace App\Entity;

use App\Repository\TicketMessageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketMessageRepository::class)]
class TicketMessage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'ticketMessage')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'ticketMessage')]
    private ?Ticket $ticket = null;

    /**
     * @var Collection<int, TicketMessageFile>
     */
    #[ORM\OneToMany(targetEntity: TicketMessageFile::class, mappedBy: 'ticketMessage')]
    private Collection $ticketMessageFile;

    public function __construct()
    {
        $this->ticketMessageFile = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getTicket(): ?Ticket
    {
        return $this->ticket;
    }

    public function setTicket(?Ticket $ticket): static
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * @return Collection<int, TicketMessageFile>
     */
    public function getTicketMessageFile(): Collection
    {
        return $this->ticketMessageFile;
    }

    public function addTicketMessageFile(TicketMessageFile $ticketMessageFile): static
    {
        if (!$this->ticketMessageFile->contains($ticketMessageFile)) {
            $this->ticketMessageFile->add($ticketMessageFile);
            $ticketMessageFile->setTicketMessage($this);
        }

        return $this;
    }

    public function removeTicketMessageFile(TicketMessageFile $ticketMessageFile): static
    {
        if ($this->ticketMessageFile->removeElement($ticketMessageFile)) {
            // set the owning side to null (unless already changed)
            if ($ticketMessageFile->getTicketMessage() === $this) {
                $ticketMessageFile->setTicketMessage(null);
            }
        }

        return $this;
    }
}
