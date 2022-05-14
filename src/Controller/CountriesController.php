<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Countries;
use Doctrine\Persistence\ManagerRegistry;

class CountriesController extends AbstractController
{
    /**
     * @Route("/countries", name="countries")
     */
    public function index(ManagerRegistry $doctrine)
    {
        /** @var countries $countries */
        $countries = $doctrine->getRepository(Countries::class)->findAll();

        if (!$countries) {
            throw $this->createNotFoundException('No Country found');
            }
    
         return $this->render('countries/index.html.twig', [
             'countries' => $countries,
             ]);
       
    }

    /**
     * @Route("/countries/{id}", name="country_show")
     */
    public function show(ManagerRegistry $doctrine, $id)
    {
        /** @var countries $countries */
        $countries = $doctrine->getRepository(Countries::class)->find($id);

        if (!$countries) {
            throw $this->createNotFoundException('Country $id not found');
            }
         return $this->render('countries/show.html.twig', [
             'countries' => $countries,
             ]);
    }
}
