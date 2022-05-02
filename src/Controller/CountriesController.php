<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Countries;

class CountriesController extends AbstractController
{
    /**
     * @Route("/countries", name="countries")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Countries::class);
        
        /** @var countries $countries */
        $countries = $repository->findAll();

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
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Countries::class);
        
        /** @var countries $countries */
        $countries = $repository->find($id);

        if (!$countries) {
            throw $this->createNotFoundException('Country $id not found');
            }
         return $this->render('countries/show.html.twig', [
             'countries' => $countries,
             ]);
    }
}
