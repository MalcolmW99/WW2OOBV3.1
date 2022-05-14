<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Continents;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;


class ContinentsController extends AbstractController
{
    /**
     * @Route("/continents", name="continents")
     */
    public function index(ManagerRegistry $doctrine)
    {
        /** @var continents $continents */
        $continents = $doctrine->getRepository(Continents::class)->findAll();

        if (!$continents) {
            throw $this->createNotFoundException('No Continent found');
            }

            return $this->render('continents/index.html.twig', [
            'continents' => $continents,
            ]);
    }

    /**
    * @Route("/continents/{id}", name="continent_show")
    */
    public function show(ManagerRegistry $doctrine, $id)
    {
        /** @var continents $continents */
        $continents = $doctrine->getRepository(Continents::class)->find($id);

        if (!$continents) {
            throw $this->createNotFoundException('Continent $id not found');
            }
         return $this->render('continents/show.html.twig', [
             'continents' => $continents,
             ]);
       
    }
}
