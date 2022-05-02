<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Location;
use App\Entity\User;
use App\Entity\UnitStatus;


class LocationController extends AbstractController
{
    /**
     * @Route("/location", name="location")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Location::class);
        
        /** @var locations $locations */
        $locations = $repository->findAll();

        if (!$locations) {
            throw $this->createNotFoundException('Location not found');
        }
        return $this->render('location/index.html.twig', [
             'locations' => $locations,
        ]);
    }

    /**
     * @Route("/location/{id}", name="location_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Location::class);
        
        /** @var location $uslocations */
        $locations = $repository->find($id);

        if (!$locations) {
            throw $this->createNotFoundException('Location $id not found');
        }
        /** @var user $user */
        $user = $this->getUser();

        $SelectedDate = $user->getSelectedDate();

        /** @var unitstatus $unitstatus */
        $unitstatus = $locations->getUnitStatuses();
        
        /** @var unitstatus $unitlocations  */
        $repository = $this->getDoctrine()->getRepository(UnitStatus::class);
        $unitlocations = $repository-> findByLocation($id);
        dump($unitlocations);
        return $this->render('location/show.html.twig', [
             'locations' => $locations,
             'unitlocations' => $unitlocations,
             'unitstatuses' => $unitstatus,

        ]);
    }
}
