<?php

namespace App\Controller;

use App\Entity\Countries;
use App\Entity\Forces;
use App\Entity\ForceType;
use App\Entity\Service;
use App\Entity\SubCampaign;
use App\Entity\Units;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    /**
     * @Route("/svice_change/{id}", name="svice_change")
     */
    public function change($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $repository = $this->getDoctrine()->getRepository(Service::class);
        
        /** @var service $service */
        $service = $repository->find($id);

        if (!$service) {
            throw $this->createNotFoundException('Service $id not found');
        }
        /** @var user $user */
        $user = $this->getUser();

        if (!$user) {
            throw $this->createNotFoundException('No User found');
        }
        $selecteddate = $service->getDateSelected();
        $unit = $service->getUnit();
        $country = $service->getCountry();
        $subcampaign = $service->getSubcampaign();
        $force = $service->getForces();
        

       $repository = $this->getDoctrine()->getRepository(SubCampaign::class);
        
        /** @var subcampaign $subcamp */
       $subcamp = $repository->find($subcampaign);

        $scsd = $subcamp->getStartDate();
        $sced = $subcamp->getEndDate();


        $repository = $this->getDoctrine()->getRepository(Units::class);
        $units = $repository->find($unit);

        $repository = $this->getDoctrine()->getRepository(Countries::class);
        $countries = $repository->find($country);

        $repository = $this->getDoctrine()->getRepository(Forces::class);
        $forces = $repository->find($force);
        
        $userdate = $user->setSelectedDate($selecteddate);
        $userunit = $user->setUnit($units);
        $usercountry = $user->setCountry($countries);
        $usersubcamp = $user->setSubcampaign($subcamp);
        $userforces = $user->setForces($forces);
        $userscsd = $user->setSCStartDate($scsd);
        $usersced = $user->setSCEndDate($sced);
        

        $entityManager->flush();




        return $this->render('service/change.html.twig', [
            'service' => $service
            
        ]);
    }
}
