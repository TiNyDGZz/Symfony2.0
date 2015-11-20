<?php
/**
 * Created by PhpStorm.
 * User: AntoineEisele
 * Date: 20/11/2015
 * Time: 13:51
 */

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Grade;
use AppBundle\Entity\Exam;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGradeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Je créé les objets que je veux pour mes tests
        $grade = new Grade();
        $grade->setStudent($this->getReference('student'));
        $grade->setGradeNumber('18');
        $grade->setExam($this->getReference('exam'));

        // Je sauvegarde en DB
        $manager->persist($grade);
        $manager->flush();
    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 20;
    }
}