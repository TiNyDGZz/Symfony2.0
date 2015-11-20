<?php
/**
 * Created by PhpStorm.
 * User: AntoineEisele
 * Date: 20/11/2015
 * Time: 12:16
 */
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Admin;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class LoadAdminData
 */
class LoadAdminData extends AbstractFixture implements OrderedFixtureInterface
{
    use ContainerAwareTrait;

    public function load(ObjectManager $manager)
    {
        $admin = new Admin();
        // à compléter

        // La sauvegarde est différente ici
        //$this->container->get('fos_user.user_manager')->updateUser($admin);
    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}