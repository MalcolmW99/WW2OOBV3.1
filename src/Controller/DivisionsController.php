<?php

namespace App\Controller;

use App\Entity\Divisions;
use App\Entity\Sessionvars;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DivisionsController extends AbstractController
{
    /**
     * @Route("/division", name="division")
     */
    public function index()
    {
        {
            $repository = $this->getDoctrine()->getRepository(Divisions::class);
            
            /** @var divisions $divisions */
            $divisions = $repository->findAll();
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
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Divisions::class);
        
        /** @var Divisions $divisions */
        $divisions = $repository->find($id);
        if (!$divisions) {
            throw $this->createNotFoundException('Location $id not found');
            }
        return $this->render('divisions/show.html.twig', [
            'divisions' => $divisions,
        ]);
    }

}
