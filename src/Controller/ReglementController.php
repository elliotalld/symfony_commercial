<?php

namespace App\Controller;

use App\Entity\Reglement;
use App\Form\ReglementType;
use App\Repository\ReglementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reglement")
 */
class ReglementController extends AbstractController
{
    /**
     * @Route("/", name="reglement_index", methods={"GET"})
     */
    public function index(ReglementRepository $reglementRepository): Response
    {
        return $this->render('reglement/index.html.twig', [
            'reglements' => $reglementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reglement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reglement = new Reglement();
        $form = $this->createForm(ReglementType::class, $reglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reglement);
            $entityManager->flush();

            return $this->redirectToRoute('reglement_index');
        }

        return $this->render('reglement/new.html.twig', [
            'reglement' => $reglement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reglement_show", methods={"GET"})
     */
    public function show(Reglement $reglement): Response
    {
        return $this->render('reglement/show.html.twig', [
            'reglement' => $reglement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reglement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reglement $reglement): Response
    {
        $form = $this->createForm(ReglementType::class, $reglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reglement_index');
        }

        return $this->render('reglement/edit.html.twig', [
            'reglement' => $reglement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reglement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Reglement $reglement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reglement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reglement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reglement_index');
    }
}
