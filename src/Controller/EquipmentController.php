<?php

namespace App\Controller;

use App\Entity\Equipment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EquipmentController extends AbstractController
{
    /**
     * @Route("/equipment", name="equipment")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Equipment::class);
        
        /** @var equipment $equipment */
         $equipment = $repository->findAll();

         if (!$equipment) {
             throw $this->createNotFoundException('No Equipment found');
        }

        return $this->render('equipment/index.html.twig', [
             'equipments' => $equipment,
         ]);
    }

}
