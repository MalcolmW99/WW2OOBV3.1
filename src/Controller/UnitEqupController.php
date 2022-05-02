<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UnitEqupController extends AbstractController
{
    /**
     * @Route("/unitequp", name="unitequp")
     */
    public function index()
    {
        return $this->render('unit_equp/index.html.twig', [
            'controller_name' => 'UnitEqupController',
        ]);
    }
}
