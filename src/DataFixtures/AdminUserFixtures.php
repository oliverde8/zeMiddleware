<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminUserFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface  */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->setUsername('admin');
        $user->setFirstName('Admin');
        $user->setLastName('Admin');
        $user->setPassword($this->passwordEncoder->encodePassword($user, '1+Password'));
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);

        $manager->persist($user);
        $manager->flush();
    }
}
