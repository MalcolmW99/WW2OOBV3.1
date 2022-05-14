<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ForceTypeController extends AbstractController
{
    /**
     * @Route("/force/type", name="force_type")
     */
    public function index(ManagerRegistry $doctrine)
    {
        return $this->render('force_type/index.html.twig', [
            'controller_name' => 'ForceTypeController',
        ]);
    }
}
