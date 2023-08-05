<?php

namespace App\Controller;

use App\Entity\Fronts;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontsController extends AbstractController
{
    /**
     * @Route("/fronts", name="fronts")
     */
    public function index(ManagerRegistry $doctrine)
    {
        /** @var front $fronts */
         $fronts = $doctrine->getRepository(Fronts::class)->findBy([], ['SortOrder' => 'ASC']);

         if (!$fronts) {
             throw $this->createNotFoundException('No Front found');
        }
         return $this->render('fronts/index.html.twig', [
             'fronts' => $fronts,
             
         ]);
    }

    /**
    * @Route("/fronts/{id}", name="front_show")
    */
    public function show(ManagerRegistry $doctrine, $id)
    {
        /** @var fronts $fronts */
        $fronts = $doctrine->getRepository(Fronts::class)->find($id);

        if (!$fronts) {
            throw $this->createNotFoundException('Front $id not found');
        }
         return $this->render('fronts/show.html.twig', [
             'fronts' => $fronts,
             ]);
    }
}
