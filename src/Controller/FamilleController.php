<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Famille;
use App\Form\FamilleType;
use App\Repository\FamilleRepository;


class FamilleController extends AbstractController
{



 /**
  * @Route("/famille/liste", name="famille_list")
  */
    public function FamilleShow()
    {
        $famille = $this->getDoctrine()
        ->getRepository(Famille::class)
        ->findAll();       
        return $this->render('famille/liste.html.twig',array(
            'famille' => $famille
        ));
        
    }

    /**
     * @Route("/famille", name="add_famille")
     */
 
    public function new(Request $request , objectManager $manager)
    {
      
        $famille = new Famille();
        $form = $this->createForm(FamilleType::class, $famille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($famille);
            $entityManager->flush();

          
        }

        return $this->render('famille/new.html.twig', [
            
            'formf' => $form->createView(),
        ]);
    }


     /**
     *@Route("/famille/edit/{id}", name="famille_edit")
     */
    public function edit(Request $request, $id)
    {
       
      $famille = new Famille();
      $famille = $this->getDoctrine()->getRepository
      (Famille::class)->find($id);
        $form = $this->createForm(FamilleType::class, $famille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

           
        }

        return $this->render('famille/edit.html.twig', array(
            'formf' => $form->createView(),
        ));
    
    }

    
/**
 * @Route("/famille/delete/{id}" , name="delete_fam")
 */

     public function delete($id){


        $em = $this->getDoctrine()->getManager();
        $famille = $this->getDoctrine()->getRepository
        (Famille::class)->find($id);
        
        $em->remove($famille);
        $em->flush();
  
        return $this->redirectToRoute('famille_list');
      }


}



