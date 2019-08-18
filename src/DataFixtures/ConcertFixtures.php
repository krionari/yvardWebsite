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

        $concert1 = new Concert();
        $concert1->setDate(\DateTime::createFromFormat('Y-m-d', "2028-08-23"));
        $concert1->setCity('Paris');
        $concert1->setPlace('Stade de France');
        $concert1->setAdress('20, cours Victor Hugo');
        $concert1->setPostalCode(75000);
        $manager->persist($concert1);

        $concert2 = new Concert();
        $concert2->setDate(\DateTime::createFromFormat('Y-m-d', "2020-02-10"));
        $concert2->setCity('Mérignac');
        $concert2->setPlace('Pin Galant');
        $concert2->setAdress('34, Avenue du Maréchal de Lattre de Tassigny');
        $concert2->setPostalCode(33700);
        $manager->persist($concert2);
        $this->addReference('concert_PinGalant', $concert2);

        $manager->flush();
    }
}
