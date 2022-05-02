<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Campaign;
use App\Entity\User;

class CampaignController extends AbstractController
{
    /**
     * @Route("/campaign", name="campaign")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Campaign::class);
        
        /** @var campaign $campaigns */
         $campaigns = $repository->findAll();

         if (!$campaigns) {
             throw $this->createNotFoundException('No Campaign found');
        }

        return $this->render('campaign/index.html.twig', [
             'campaigns' => $campaigns,
         ]);
    }

    /**
    * @Route("/campaign/{id}", name="campaign_show")
    */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Campaign::class);
        
        /** @var campaign $campaigns */
        $campaigns = $repository->find($id);

        if (!$campaigns) {
            throw $this->createNotFoundException('Campaign $id not found');
            }
         return $this->render('campaign/show.html.twig', [
             'campaigns' => $campaigns,
             ]);
       
    }

}
