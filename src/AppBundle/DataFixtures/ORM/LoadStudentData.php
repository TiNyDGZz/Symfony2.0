<?php
/**
 * Created by PhpStorm.
 * User: AntoineEisele
 * Date: 20/11/2015
 * Time: 12:14
 */
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Student;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadStudentData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Je créé les objets que je veux pour mes tests
        $student = new Student();
        $student->setEmail('test@test.com');
        $student->setFirstName('Jean');
        $student->setLastName('Dupont');

        // Je sauvegarde en DB
        $manager->persist($student);
        $manager->flush();

        $this->addReference('student', $student);
    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 10;
    }
}