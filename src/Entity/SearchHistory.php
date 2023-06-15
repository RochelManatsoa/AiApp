<?php

namespace App\Entity;

use App\Repository\SearchHistoryRepository;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SearchHistoryRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class SearchHistory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $query;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cleanQuery;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $queryFollowup;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $results;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="searchHistories")
     */
    private $user;
    
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->createdAt = new \DateTime();
        $this->slugger = $slugger;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function setQuery(?string $query): self
    {
        $this->query = $query;

        return $this;
    }

    public function getCleanQuery(): ?string
    {
        return $this->cleanQuery;
    }

    public function setCleanQuery(?string $cleanQuery): self
    {
        $this->cleanQuery = $cleanQuery;

        return $this;
    }

    public function getQueryFollowup(): ?string
    {
        return $this->queryFollowup;
    }

    public function setQueryFollowup(?string $queryFollowup): self
    {
        $this->queryFollowup = $queryFollowup;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getResults(): ?int
    {
        return $this->results;
    }

    public function setResults(?int $results): self
    {
        $this->results = $results;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function generateSlug(): void
    {
        $this->cleanQuery = $this->slugger->slug($this->query)->lower();
    }
}
