<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\SubCampaign;
use App\Entity\Sessionvars;

class SubcampaignController extends AbstractController
{
    /**
     * @Route("/subcampaign", name="subcampaign")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(SubCampaign::class);
        
        /** @var subcampaign $subcampaigns */
         $subcampaigns = $repository->findAll();
         if (!$subcampaigns) {
             throw $this->createNotFoundException('No Subcampaign found');
         }
        return $this->render('subcampaign/index.html.twig', [
             'subcampaigns' => $subcampaigns,
        ]);
    }

    /**
     * @Route("/subcampaign/{id}", name="subcampaign_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Subcampaign::class);
        
        /** @var subcampaign $subcampaigns */
        $subcampaigns = $repository->find($id);

        if (!$subcampaigns) {
            throw $this->createNotFoundException('Subcampaign $id not found');
        }
        /** @var user $user */
        $user = $this->getUser();

        if (!$user) {
            throw $this->createNotFoundException('No User found');
        }
        $SelectedDate = $user->getSelectedDate();
        
        return $this->render('subcampaign/show.html.twig', [
             'subcampaigns' => $subcampaigns,
        ]);
    }

    /**
     * @Route("/subcampaign2/{id}", name="subcampaign_change")
     */
    public function change($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()->getRepository(Subcampaign::class);
        
        /** @var subcampaign $subcampaigns */
        $subcampaigns = $repository->find($id);
        
        if (!$subcampaigns) {
            throw $this->createNotFoundException('Subcampaign $id not found');
        }
        
        // usually you'll want to make sure the user is authenticated first
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // returns your User object, or null if the user is not authenticated
        // use inline documentation to tell your editor your exact User class
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        if (!$user) {
            throw $this->createNotFoundException('No User found');
        }
        
        $userid = $user->getid();
        
        $unit = $subcampaigns->getTopUnit();
        $userunit = $user->setUnit($unit);
        
        $usersubc = $user->setSubcampaign($subcampaigns);
        // add SC start and end dates
        $startdate = $subcampaigns->getStartDate();
        $sdate = $user->setSCStartDate($startdate);
        
        $enddate = $subcampaigns->getEndDate();
        $edate = $user->setSCEndDate($enddate);
        
        $country = $unit->getCountry();
        $usercountry = $user->setcountry($country);
        
        
        // Need to add Force but for the moment it will always be AirForce


        $seldate = $user->getSelectedDate();

        if ($seldate < $startdate){
            $userdate = $user->setSelectedDate($startdate);
        }

        if ($seldate > $enddate){
            $userdate = $user->setSelectedDate($enddate);
        }

        
        $entityManager->flush();



        return $this->render('subcampaign/show.html.twig', [
             'subcampaigns' => $subcampaigns,
        ]);
    }



}
