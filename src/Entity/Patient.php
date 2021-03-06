<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true)
     */
    private $patientUUID;

    /**
     * @ORM\Column(type="uuid")
     * Maps to User.userUUID
     */
    private $userUUID;

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
    private $birthDate;

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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    public function __construct()
    {
        $this->patientUUID = Uuid::v4();
        $this->datetimeAdded = new \DateTime();
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
        return $this->userUUID;
    }

    public function setUser(Uuid $userUUID): self
    {
        $this->userUUID = $userUUID;
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

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }
}
