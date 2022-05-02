<?php

namespace App\Controller;

use App\Entity\Subcontinents;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SubContinentController extends AbstractController
{
    /**
     * @Route("/subcontinents", name="subcontinents")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Subcontinents::class);
            
        /** @var subcontinents $subcontinents */
        $subcontinents = $repository->findAll();

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
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Subcontinents::class);
        
        /** @var subcontinents $subcontinents */
        $subcontinents = $repository->find($id);

        if (!$subcontinents) {
            throw $this->createNotFoundException('Subcontinent $id not found');
        }

         return $this->render('subcontinent/show.html.twig', [
             'subcontinents' => $subcontinents,
             ]);
    }
}

