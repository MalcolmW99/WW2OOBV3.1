<?php

namespace App\Controller;

use App\Entity\Fronts;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontsController extends AbstractController
{
    /**
     * @Route("/fronts", name="fronts")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Fronts::class);
        
        /** @var front $fronts */
         $fronts = $repository->findBy([], ['SortOrder' => 'ASC']);

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
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Fronts::class);
        
        /** @var fronts $fronts */
        $fronts = $repository->find($id);

        if (!$fronts) {
            throw $this->createNotFoundException('Front $id not found');
        }
         return $this->render('fronts/show.html.twig', [
             'fronts' => $fronts,
             ]);
    }
}
