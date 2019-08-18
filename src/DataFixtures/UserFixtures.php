<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail('krionari@gmail.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setSkill('Chanteur');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'admin'));
        $manager->persist($admin);
        $this->addReference('user_admin', $admin);

        $manager->flush();
    }
}
