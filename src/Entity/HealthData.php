<?php

namespace App\Entity;

use App\Repository\HealthDataRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity(repositoryClass=HealthDataRepository::class)
 */
class HealthData
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true)
     */
    private $healthDataUUID;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="healthData")
     * ORM\JoinColumn(nullable=false)
     * @ORM\JoinColumn(name="patientUUID", referencedColumnName="patientUUID")
     */
    private $patient;

    /**
     * There is no automated procedure to create a UUID, so we need to do it manually.
     */ 
    public function __construct(){
        $this->healthDataUUID = Uuid::v4();
    }

    public function getHealthDataUUID()
    {
        return $this->healthDataUUID;
    }

    public function setHealthDataUUID($healthDataUUID): self
    {
        $this->healthDataUUID = $healthDataUUID;
        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
}
