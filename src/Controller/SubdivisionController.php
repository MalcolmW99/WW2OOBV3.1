<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Subdivisions;
use App\Entity\Sessionvars;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SubdivisionController extends AbstractController
{
    /**
     * @Route("/subdivision", name="subdivision")
     */
    public function index(ManagerRegistry $doctrine)
    {
        /** @var subdivisions $subdivisions */
        $subdivisions = $doctrine->getRepository(Subdivisions::class)->findAll();

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
    public function show(ManagerRegistry $doctrine, $id)
    {
        /** @var Subdivisions $subdivisions */
        $subdivisions = $doctrine->getRepository(Subdivisions::class)->find($id);
        if (!$subdivisions) {
            throw $this->createNotFoundException('Location $id not found');
        }
        return $this->render('subdivision/show.html.twig', [
             'subdivisions' => $subdivisions,
        ]);
    }
}
