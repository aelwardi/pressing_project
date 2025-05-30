<?php

namespace App\Entity;

use App\Repository\TicketMessageFileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketMessageFileRepository::class)]
class TicketMessageFile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\Column(length: 255)]
    private ?string $fileType = null;

    #[ORM\ManyToOne(inversedBy: 'ticketMessageFile')]
    private ?TicketMessage $ticketMessage = null;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getFileType(): ?string
    {
        return $this->fileType;
    }

    public function setFileType(string $fileType): static
    {
        $this->fileType = $fileType;

        return $this;
    }

    public function getTicketMessage(): ?TicketMessage
    {
        return $this->ticketMessage;
    }

    public function setTicketMessage(?TicketMessage $ticketMessage): static
    {
        $this->ticketMessage = $ticketMessage;

        return $this;
    }
}
