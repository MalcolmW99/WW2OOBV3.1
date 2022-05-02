<?php

namespace App\Controller;

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
    public function index()
    {
         /** @var \App\Entity\User $user */
         $user = $this->getUser();
         if (!$user) {
             throw $this->createNotFoundException('No User found');
        }
        
        $repository = $this->getDoctrine()->getRepository(Units::class);
        
        /** @var units $units */
         $units = $repository->findAll();

         if (!$units) {
             throw $this->createNotFoundException('No Unit found');
        }
        
        $repository = $this->getDoctrine()->getRepository(User::class);
        
       
        return $this->render('units/index.html.twig', [
            'units' => $units,
            'user' => $user,
            'controller_name' => 'UnitsController',
        ]);
    }

   /**
     * @Route("/units/{id}", name="unit_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Units::class);
        
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

        /** @var unitstatus $HigherUnit  */
        $repository = $this->getDoctrine()->getRepository(UnitStatus::class);
        $HigherUnit = $repository-> findByHigherUnit($id, $SelectedDate);

        $repository = $this->getDoctrine()->getRepository(UnitEqup::class);
        $UnitEqup = $repository-> findByUnit($id);
        
        return $this->render('units/show.html.twig', [
            'units' => $units,
            'unitstatuses' => $unitstatus,
            'higherunits' => $HigherUnit,
            'unitequps' => $UnitEqup,
        ]);
    }
}
