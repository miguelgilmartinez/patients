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
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="health_data")
     * @ORM\JoinColumn(name="patient", referencedColumnName="patient_uuid", nullable=false)
     */
    private $patient;

    /**
     * UUID and Patient come from Message Broker.
     */
    public function __construct(
        \Symfony\Component\Uid\UuidV4 $uuid,
        \App\Entity\Patient $patient
    ) {
        $this->healthDataUUID = $uuid;
        $this->patient = $patient;
    }

    public function getHealthDataUUID()
    {
        return $this->healthDataUUID;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): void
    {
        $this->patient = $patient;
    }
}
