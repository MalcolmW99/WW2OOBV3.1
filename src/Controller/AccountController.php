<?php

namespace App\Controller;

use App\Entity\Headline;
use App\Entity\UnitEqup;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\UnitStatus;
use App\Entity\User;
use Doctrine\DBAL\Tools\Dumper;
use Symfony\Component\HttpFoundation\Request;

/**
* @IsGranted("ROLE_USER")
*/
class AccountController extends BaseController
{
    /**
     * @Route("/account", name="app_account")
     */
    public function index(LoggerInterface $logger)
    {
        $logger->debug('Checking account page for '.$this->getUser()->getEmail());

        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    /**
     * @Route("/dateupdate/{id}", name="app_dateupdate")
     */
    public function dateupdate(Request $request, $id)
    {
        $entity = $request->query->get('entity');
        $type = $request->query->get('date');
                
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        if (!$user) {
            throw $this->createNotFoundException('No User found');
        }
        
        // Get subcampaign start and finish dates
        $sc_start = $user->getSCStartDate();
        $sc_end = $user->getSCEndDate();
        
        $entityManager = $this->getDoctrine()->getManager();
        
        if ($entity == 'unitstatus') {
        
            $repository = $this->getDoctrine()->getRepository(UnitStatus::class);
        
            /** @var unitstatus $unitstatus */
            $unitstatus = $repository->find($id);
            
            if (!$unitstatus) {
                throw $this->createNotFoundException('Unitstatus $id not found');
            }
            if ($type == 'Start') {
                $selecteddate = $unitstatus->getStartDate();
            }
            if ($type == 'End') {
                $selecteddate = $unitstatus->getEndDate();
            }
            
        }
        if ($entity == 'unitequp') {
            
            $repository = $this->getDoctrine()->getRepository(UnitEqup::class);
            
            /** @var unitequp $unitequp */
            $unitequp = $repository->find($id);
            
            if (!$unitequp) {
                throw $this->createNotFoundException('Unitequp $id not found');
            }
            if ($type == 'Start') {
                $selecteddate = $unitequp->getStartDate();
            }
            if ($type == 'End') {
                $selecteddate = $unitequp->getEndDate();
            }
        }
        if ($entity == 'headline') {
            
            $repository = $this->getDoctrine()->getRepository(Headline::class);
            
            /** @var headline $headline */
            $headline = $repository->find($id);
            
            if (!$headline) {
                throw $this->createNotFoundException('Headline $id not found');
            }
            
            $selecteddate = $headline->getDate();
        }

        // Check if date is within bounds
        
        if ($selecteddate>=$sc_start && $selecteddate<=$sc_end) {
            $userdate = $user->setSelectedDate($selecteddate);
            $entityManager->flush();

            return $this->render('account/index.html.twig', [
                'controller_name' => 'AccountController',
            ]);
        }
        dd('Date Rejected');
    
        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    /**
     * @Route("/plusday", name="plusday")
     */
    public function plusday()
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        if (!$user) {
            throw $this->createNotFoundException('No User found');
        }
        
        // Get subcampaign start and finish dates
        $sc_start = $user->getSCStartDate();
        $sc_end = $user->getSCEndDate();

        $selecteddate = $user->getSelectedDate();
        
        $selecteddate->add(new DateInterval('P1D'));

        dd($selecteddate);

        $entityManager = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()->getRepository(UnitStatus::class);
        
        /** @var unitstatus $unitstatus */
        $unitstatus = $repository->find($id);
        
        if (!$unitstatus) {
            throw $this->createNotFoundException('Unitstatus $id not found');
        }

        $selecteddate = $unitstatus->getStartDate();
        // Check if date is within bounds
        if ($selecteddate>=$sc_start && $selecteddate<=$sc_end) {
            $userdate = $user->setSelectedDate($selecteddate);
            $entityManager->flush();

            return $this->render('account/index.html.twig', [
                'controller_name' => 'AccountController',
            ]);
        }
        dd('Date Rejected');
    
        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

 }
