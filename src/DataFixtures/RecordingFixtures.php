<?php

namespace App\DataFixtures;

use App\Entity\Recording;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class RecordingFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $recording = new Recording();
        $recording->setReleaseDate(\DateTime::createFromFormat('Y-m-d', "2020-02-14"));
        $recording->setName('Le temps des excuses');

        $manager->persist($recording);

        $manager->flush();
    }
}
