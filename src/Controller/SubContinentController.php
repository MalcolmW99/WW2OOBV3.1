<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Subcontinents;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SubContinentController extends AbstractController
{
    /**
     * @Route("/subcontinents", name="subcontinents")
     */
    public function index(ManagerRegistry $doctrine)
    {
        /** @var subcontinents $subcontinents */
        $subcontinents = $doctrine->getRepository(Subcontinents::class)->findAll();

        if (!$subcontinents) {
            throw $this->createNotFoundException('No Country found');
        }
            return $this->render('subcontinent/index.html.twig', [
             'subcontinents' => $subcontinents,
             ]);
        }

    /**
     * @Route("/subcontinents/{id}", name="subcontinent_show")
     */
    public function show(ManagerRegistry $doctrine, $id)
    {
        /** @var subcontinents $subcontinents */
        $subcontinents = $doctrine->getRepository(Subcontinents::class)->find($id);

        if (!$subcontinents) {
            throw $this->createNotFoundException('Subcontinent $id not found');
        }

         return $this->render('subcontinent/show.html.twig', [
             'subcontinents' => $subcontinents,
             ]);
    }
}

