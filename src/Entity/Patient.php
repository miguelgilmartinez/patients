<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="uuid")
     */
    private $patientUUID;

    /**
     * @ORM\Column(type="binary")
     * Maps to User.userUUID 
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $timeZone;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $gender;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfBirth;

    /**
     * @ORM\ManyToOne(targetEntity=Activity::class, inversedBy="hobbies")
     */
    private $activity;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $hobbies;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $emergencyPhone;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $emergencyName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetimeAdded;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $friendPhone;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $operatorPhone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatientUuid()
    {
        return $this->patientUUID;
    }

    public function setPatientUuid($patientUUID): self
    {
        $this->patientUUID = $patientUUID;
        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getTest()
    {
        return $this->test;
    }

    public function setTest($test): self
    {
        $this->test = $test;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTimeZone(): ?string
    {
        return $this->timeZone;
    }

    public function setTimeZone(string $timeZone): self
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(?Activity $activity): self
    {
        $this->activity = $activity;
        return $this;
    }

    public function getHobbies(): ?string
    {
        return $this->hobbies;
    }

    public function setHobbies(?string $hobbies): self
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    public function getEmergencyPhone(): ?string
    {
        return $this->emergencyPhone;
    }

    public function setEmergencyPhone(?string $emergencyPhone): self
    {
        $this->emergencyPhone = $emergencyPhone;

        return $this;
    }

    public function getEmergencyName(): ?string
    {
        return $this->emergencyName;
    }

    public function setEmergencyName(string $emergencyName): self
    {
        $this->emergencyName = $emergencyName;

        return $this;
    }

    public function getDatetimeAdded(): ?\DateTimeInterface
    {
        return $this->datetimeAdded;
    }

    public function setDatetimeAdded(\DateTimeInterface $datetimeAdded): self
    {
        $this->datetimeAdded = $datetimeAdded;

        return $this;
    }

    public function getFriendPhone(): ?string
    {
        return $this->friendPhone;
    }

    public function setFriendPhone(?string $friendPhone): self
    {
        $this->friendPhone = $friendPhone;

        return $this;
    }

    public function getOperatorPhone(): ?string
    {
        return $this->operatorPhone;
    }

    public function setOperatorPhone(string $operatorPhone): self
    {
        $this->operatorPhone = $operatorPhone;

        return $this;
    }
}
