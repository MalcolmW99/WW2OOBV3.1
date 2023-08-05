<?php

namespace App\Controller;

use App\Entity\Divisions;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Sessionvars;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DivisionsController extends AbstractController
{
    /**
     * @Route("/division", name="division")
     */
    public function index(ManagerRegistry $doctrine)
    {
        {
            /** @var divisions $divisions */
            $divisions = $doctrine->getRepository(Divisions::class)->findAll();
            if (!$divisions) {
                throw $this->createNotFoundException('No divisions found');
                }
            return $this->render('divisions/index.html.twig', [
                'divisions' => $divisions,
            ]);
        }
    }
    /**
     * @Route("/division/{id}", name="division_show")
     */
    public function show(ManagerRegistry $doctrine, $id)
    {
        /** @var Divisions $divisions */
        $divisions = $doctrine->getRepository(Divisions::class)->find($id);
        if (!$divisions) {
            throw $this->createNotFoundException('Location $id not found');
            }
        return $this->render('divisions/show.html.twig', [
            'divisions' => $divisions,
        ]);
    }

}
