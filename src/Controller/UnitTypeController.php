<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\UnitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UnitTypeController extends AbstractController
{
    /**
     * @Route("/unittype", name="unit_type")
     */
    public function index(ManagerRegistry $doctrine)
    {
        /** @var unittype $unittype */
         $unittype = $doctrine->getRepository(UnitType::class)->findBy([],['ForceType' => 'ASC'] );

         if (!$unittype) {
             throw $this->createNotFoundException('No Unit found');
        }
          
        return $this->render('unit_type/index.html.twig', [
            'unittypes' => $unittype,
            'controller_name' => 'UnitTypeController',
        ]);
    }

   /**
     * @Route("/unittype/{id}", name="unittype_show")
     */
    public function show(ManagerRegistry $doctrine, $id)
    {
        /** @var unittpe $unittype */
        $unittype = $doctrine->getRepository(UnitType::class)->find($id);

        if (!$unittype) {
            throw $this->createNotFoundException('Unit $id not found');
        }
        return $this->render('unit_type/show.html.twig', [
            'unittype' => $unittype,
        ]);
        }
}
