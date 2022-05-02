<?php

namespace App\Controller;

use App\Entity\Subdivisions;
use App\Entity\Sessionvars;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SubdivisionController extends AbstractController
{
    /**
     * @Route("/subdivision", name="subdivision")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Subdivisions::class);
        
        /** @var subdivisions $subdivisions */
        $subdivisions = $repository->findAll();

        if (!$subdivisions) {
            throw $this->createNotFoundException('No subdivisions found');
        }
        return $this->render('subdivision/index.html.twig', [
            'subdivisions' => $subdivisions,
        ]);
    }

    /**
     * @Route("/subdivision/{id}", name="subdivision_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Subdivisions::class);
        
        /** @var Subdivisions $subdivisions */
        $subdivisions = $repository->find($id);
        if (!$subdivisions) {
            throw $this->createNotFoundException('Location $id not found');
        }
        return $this->render('subdivision/show.html.twig', [
             'subdivisions' => $subdivisions,
        ]);
    }
}
