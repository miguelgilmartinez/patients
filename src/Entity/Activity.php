<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Unique(message="The {{ value }} name is repeated.")
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Patient::class, mappedBy="activity")
     */
    private $activity;

    public function __construct()
    {
        $this->activity = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Collection|Patient[]
     */
    public function getActivity(): Collection
    {
        return $this->activity;
    }

    public function addActivity(Patient $patient): self
    {
        if (!$this->activity->contains($patient)) {
            $this->activity[] = $patient;
            $patient->setActivity($this);
        }
        return $this;
    }

    public function removeActivity(Patient $patient): self
    {
        if ($this->activity->removeElement($patient)) {
            // set the owning side to null (unless already changed)
            if ($patient->getActivity() === $this) {
                $patient->setActivity(null);
            }
        }
        return $this;
    }
}
