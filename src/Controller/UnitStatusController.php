<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Sessionvars;
use App\Entity\UnitStatus;
use app\Entity\Units;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UnitStatusController extends AbstractController
{
// NOT USED
    /**
     * @Route("/unit/status/{id}", name="unitstatus_show")
     */
    public function show(ManagerRegistry $doctrine, $id)
    {
       /** @var unitstatus $unitstatus */
            $unitstatus = $doctrine->getRepository(UnitStatus::class)->find($id);

        if (!$unitstatus) {
            throw $this->createNotFoundException('Unitstaatus $id not found');
        }

        return $this->render('unitstatus/show.html.twig', [
            'unitstatus' => $unitstatus, 

        ]);
       
    }

}
