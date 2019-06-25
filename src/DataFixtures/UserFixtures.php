<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class        UserFixtures
 *
 * @since       1.0.0
 * @package     App\DataFixtures
 * @author      Kristijan Soldo <soldokristijan@yahoo.com>
 */
class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     *
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Loads fixtures.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Initializes user
        $user = new User();

        // Fills with data
        $user->setUsername('admin');
        $user->setFirstName('Kristijan');
        $user->setLastName('Soldo');
        $user->setEmail('soldokristijan@yahoo.com');
        $user->setPassword(
            $this->passwordEncoder->encodePassword(
                $user,
                'admin'
            )
        );

        // Saves
        $manager->persist($user);
        $manager->flush();
    }
}
