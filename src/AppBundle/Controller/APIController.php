<?php
/**
 * Created by PhpStorm.
 * User: AntoineEisele
 * Date: 17/11/2015
 * Time: 16:37
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;


class APIController extends FOSRestController
{
    public function studentsAction()
    {
        $students = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Student')
            ->findAll();
        $view = $this->view($students, 200);

        return $this->handleView($view);

    }

    public function getGradesAction($id)
    {
        $student = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Student')
            ->find($id);

        $grades = $student->getGrade();


        $view = $this->view($grades, 200);

        return $this->handleView($view);
    }

    public function examsAction()
    {
        $exams = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Exam')
            ->findAll();

        $view = $this->view($exams, 200);

        return $this->handleView($view);
    }
}
