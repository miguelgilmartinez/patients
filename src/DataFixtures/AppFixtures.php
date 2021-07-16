<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use App\Entity\HealthData;
use App\Entity\User;
use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use  Symfony\Component\Uid\Uuid;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $activity = new Activity();
        $patient = new Patient();
        //This HealthData comes from Message Broker
        $hd = new HealthData(Uuid::v4(), $patient);
        $patient->setPatientUuid(Uuid::v4());
        // This Useruuid value comes from Message Broker
        $patient->setUser(Uuid::v4());
        $patient->addHealthData($hd);
        $patient->setEmail('johndoe@gmail.com');
        $patient->setTimeZone('UTC+1');
        $patient->setGender('M');
        $patient->setBirthdate(new \DateTime('1980-01-01'));
        $patient->setEmergencyPhone("+1-234-567-8901");
        $patient->setEmergencyName("123 Fake Street");
        $patient->setOperatorPhone("+34-567-8901");
      //  $manager->persist($user);
        $manager->persist($hd);
        $manager->persist($patient);
        $manager->flush();
    }
}
