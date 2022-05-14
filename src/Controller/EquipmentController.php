<?php

namespace App\Controller;

use App\Entity\Equipment;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EquipmentController extends AbstractController
{
    /**
     * @Route("/equipment", name="equipment")
     */
    public function index(ManagerRegistry $doctrine)
    {
        /** @var equipment $equipment */
         $equipment = $doctrine->getRepository(Equipment::class)->findAll();

         if (!$equipment) {
             throw $this->createNotFoundException('No Equipment found');
        }

        return $this->render('equipment/index.html.twig', [
             'equipments' => $equipment,
         ]);
    }

}
