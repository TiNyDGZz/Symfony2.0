<?php
/**
 * Created by PhpStorm.
 * User: AntoineEisele
 * Date: 16/11/2015
 * Time: 19:02
 */
namespace AppBundle\Controller;
use AppBundle\Entity\Admin;
use AppBundle\Entity\Student;
use AppBundle\Form\AdminType;
use AppBundle\Form\StudentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class AdminController
 */
class AdminController extends Controller
{
    /**
     * @Route("/admin/add", name="admin_add")
     */
    public function addAction(Request $request){
        $admin = new Admin();

        $form = $this->createForm(new AdminType(),$admin);
        if ($request->isMethod('POST')
            && $form->handleRequest($request)
            && $form->isValid()){
            $db = $this->getDoctrine()->getManager();
            $db->persist($admin);
            $db->flush();
            return $this->redirectToRoute('admin_list');
        }

        return $this->render('AppBundle:Admin:add.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/admin", name="admin_list")
     */
    public function indexAction()
    {
        $students = $this->getDoctrine()->getManager()->getRepository('AppBundle:Student')->findAll();
        $exams = $this->getDoctrine()->getManager()->getRepository('AppBundle:Exam')->findAll();
        $grades = $this->getDoctrine()->getManager()->getRepository('AppBundle:Grade')->findAll();
        $admins = $this->getDoctrine()->getManager()->getRepository('AppBundle:Admin')->findAll();
        return $this->render('AppBundle:Admin:index.html.twig', [
            'students' => $students,
            'exams' => $exams,
            'grades' => $grades,
            'admins' => $admins,
        ]);
    }
    /**
     * @Route("/admin/delete/{id}", name="admin_delete")
     */
    public function deleteAction($id)
    {
        $db = $this->getDoctrine()->getManager();
        $admin = $db
            ->getRepository('AppBundle:Admin')
            ->find($id);
        $db->remove($admin);
        $db->flush();
        return $this->redirectToRoute('admin_list');
    }
}