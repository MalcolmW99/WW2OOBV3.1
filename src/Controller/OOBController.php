<?php

namespace App\Controller;

use App\Entity\UnitEqup;
use App\Entity\User;
use App\Entity\Units;
use App\Entity\UnitStatus;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OOBController extends AbstractController
{
    /**
     * @Route("/oob/{id}", name="oob")
     */
    public function index(ManagerRegistry $doctrine, $id)
    {
        /** @var user $user */
        $user = $this->getUser();

        if (!$user) {
             throw $this->createNotFoundException('No User found');
         }
         $SelectedDate = $user->getSelectedDate();
 
        $repository = $doctrine->getRepository(UnitStatus::class);
        $HigherUnit = $repository-> findByHigherUnit($id, $SelectedDate);

        
        $repository = $doctrine->getRepository(Units::class);

        /** @var units $units */
        $units = $repository->find($id);

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

         return $this->render('OOB/index.html.twig', [   
            'units' => $units,
            'unitstatuses' => $unitstatus,
            'higherunits' => $HigherUnit

        ]);
            
    }
}