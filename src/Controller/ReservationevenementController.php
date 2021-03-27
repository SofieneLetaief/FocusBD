<?php

namespace App\Controller;

use App\Entity\Reservationevenement;
use App\Form\ReservationevenementType;
use App\Repository\ReservationevenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reservationevenement")
 */
class ReservationevenementController extends AbstractController
{
    /**
     * @Route("/", name="reservationevenement_index", methods={"GET"})
     */
    public function index(ReservationevenementRepository $reservationevenementRepository): Response
    {
        return $this->render('reservationevenement/index.html.twig', [
            'reservationevenements' => $reservationevenementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reservationevenement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reservationevenement = new Reservationevenement();
        $form = $this->createForm(ReservationevenementType::class, $reservationevenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservationevenement);
            $entityManager->flush();

            return $this->redirectToRoute('reservationevenement_index');
        }

        return $this->render('reservationevenement/new.html.twig', [
            'reservationevenement' => $reservationevenement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservationevenement_show", methods={"GET"})
     */
    public function show(Reservationevenement $reservationevenement): Response
    {
        return $this->render('reservationevenement/show.html.twig', [
            'reservationevenement' => $reservationevenement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reservationevenement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reservationevenement $reservationevenement): Response
    {
        $form = $this->createForm(ReservationevenementType::class, $reservationevenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservationevenement_index');
        }

        return $this->render('reservationevenement/edit.html.twig', [
            'reservationevenement' => $reservationevenement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservationevenement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Reservationevenement $reservationevenement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservationevenement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reservationevenement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reservationevenement_index');
    }
}
