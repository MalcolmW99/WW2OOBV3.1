<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Location;
use App\Entity\User;
use App\Entity\UnitStatus;


class LocationController extends AbstractController
{
    /**
     * @Route("/location", name="location")
     */
    public function index(ManagerRegistry $doctrine)
    {
        /** @var locations $locations */
        $locations = $doctrine->getRepository(Location::class)->findAll();

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
    public function show(ManagerRegistry $doctrine, $id)
    {
        /** @var location $uslocations */
        $locations = $doctrine->getRepository(Location::class)->find($id);

        if (!$locations) {
            throw $this->createNotFoundException('Location $id not found');
        }
        /** @var user $user */
        $user = $this->getUser();

        $SelectedDate = $user->getSelectedDate();

        /** @var unitstatus $unitstatus */
        $unitstatus = $locations->getUnitStatuses();
        
        /** @var unitstatus $unitlocations  */
        $repository = $doctrine->getRepository(UnitStatus::class);
        $unitlocations = $repository-> findByLocation($id);
        dump($unitlocations);
        return $this->render('location/show.html.twig', [
             'locations' => $locations,
             'unitlocations' => $unitlocations,
             'unitstatuses' => $unitstatus,

        ]);
    }
}
