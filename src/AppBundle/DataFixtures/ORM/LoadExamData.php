<?php
/**
 * Created by PhpStorm.
 * User: AntoineEisele
 * Date: 20/11/2015
 * Time: 14:21
 */

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Exam;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadExamData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Je créé les objets que je veux pour mes tests
        $exam = new Exam();
        $exam->setName('Fourelierie');
        $exam->setDescription('Un examen de stupidité');

        // Je sauvegarde en DB
        $manager->persist($exam);
        $manager->flush();
        $this->addReference('exam', $exam);

    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }
}