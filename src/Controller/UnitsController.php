<?php

namespace App\Controller;

use App\Entity\Forces;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\UnitEqup;
use App\Entity\User;
use App\Entity\Units;

use App\Entity\UnitStatus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UnitsController extends AbstractController
{
    /**
     * @Route("/units", name="units")
     */
    public function index(ManagerRegistry $doctrine)
    {
         /** @var \App\Entity\User $user */
         $user = $this->getUser();
         if (!$user) {
             throw $this->createNotFoundException('No User found');
        }

        $forces = $user->getForces();

        /** @var units $units */
        $units = $doctrine->getRepository(Units::class)->findByForceField($forces);
        
         if (!$units) {
             throw $this->createNotFoundException('No Unit found');
        }
       
        return $this->render('units/index.html.twig', [
            'units' => $units,
            'user' => $user,
            'controller_name' => 'UnitsController',
        ]);
    }

   /**
     * @Route("/units/{id}", name="unit_show")
     */
    public function show(ManagerRegistry $doctrine, $id)
    {
        /** @var units $units */
        $units = $doctrine->getRepository(Units::class)->find($id);

        if (!$units) {
            throw $this->createNotFoundException('Unit $id not found');
        }
        /** @var unitstatus $unitstatus */
        $unitstatus = $units ->getUnitStatuses();

        /** @var user $user */
        $user = $this->getUser();

        if (!$user) {
             throw $this->createNotFoundException('No User found');
         }
         $SelectedDate = $user->getSelectedDate();

        /** @var unitstatus $HigherUnit  */
        $HigherUnit = $doctrine->getRepository(UnitStatus::class)-> findByHigherUnit($id, $SelectedDate);

        /** @var UnitEqup $UnitEqup  */
        $UnitEqup = $doctrine->getRepository(UnitEqup::class)-> findByUnit($id);
        
        return $this->render('units/show.html.twig', [
            'units' => $units,
            'unitstatuses' => $unitstatus,
            'higherunits' => $HigherUnit,
            'unitequps' => $UnitEqup,
        ]);
    }
}
