<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Theatres;

class TheatresController extends AbstractController
{
    /**
     * @Route("/theatres", name="theatres")
     */
    public function index(ManagerRegistry $doctrine)
    {
        /** @var theatres $theatres */
        $theatres = $doctrine->getRepository(Theatres::class)->findAll();
    
        if (!$theatres) {
            throw $this->createNotFoundException('No Country found');
        }
        return $this->render('theatres/index.html.twig', [
        'theatres' => $theatres,
        ]);
    }

    /**
     * @Route("/theatres/{id}", name="theatre_show")
     */
    public function show(ManagerRegistry $doctrine, $id)
    {
        /** @var theatres $theatres */
        $theatres = $doctrine->getRepository(Theatres::class)->find($id);

        if (!$theatres) {
            throw $this->createNotFoundException('Country $id not found');
        }
        return $this->render('theatres/show.html.twig', [
            'theatres' => $theatres,
        ]);
    }
}