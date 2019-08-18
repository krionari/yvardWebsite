<?php

namespace App\DataFixtures;

use App\Entity\Concert;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class ConcertFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $concert = new Concert();
        $concert->setDate(\DateTime::createFromFormat('Y-m-d', "2028-08-23"));
        $concert->setCity('Paris');
        $concert->setPlace('Stade de France');
        $concert->setAdress('20, cours Victor Hugo');
        $concert->setPostalCode(75000);
        $manager->persist($concert);

        $concert = new Concert();
        $concert->setDate(\DateTime::createFromFormat('Y-m-d', "2020-02-10"));
        $concert->setCity('Mérignac');
        $concert->setPlace('Pin Galant');
        $concert->setAdress('34, Avenue du Maréchal de Lattre de Tassigny');
        $concert->setPostalCode(33700);
        $manager->persist($concert);

        $manager->flush();
    }
}
