<?php

namespace App\Controller;

use App\Entity\Sessionvars;
use App\Entity\UnitStatus;
use app\Entity\Units;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UnitStatusController extends AbstractController
{

    /**
     * @Route("/unit/status/{id}", name="unitstatus_show")
     */
    public function show()
    {
        $repository = $this->getDoctrine()->getRepository(Sessionvars::class);
        $id = 1;
        /** @var sessionvars $sessionvars */
         $sessionvars = $repository->find($id);

        if (!$sessionvars) {
             throw $this->createNotFoundException('No sessionvars found');
         }
        $unit = $sessionvars->getunit();
        $unitid = $unit->getID();
        
        $repository = $this->getDoctrine()->getRepository(UnitStatus::class);
        
        /** @var unitstatus $unitstatus */
        
        
        $unitstatus = $repository->findBy([$unitid]);

        if (!$unitstatus) {
            throw $this->createNotFoundException('Unit $id not found');
        }

        return $this->render('units/show.html.twig', [
            'units' => $units,

        ]);
       
    }

}