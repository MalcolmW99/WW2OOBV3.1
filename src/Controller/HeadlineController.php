<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Headline;
use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\HeadlineRepository;
use App\Repository\DetailRepository;
use App\Entity\Sessionvars;
use Symfony\Component\HttpFoundation\Response;

class HeadlineController extends AbstractController
{
     /**
     * @Route("/headline", name="headline")
     */
    public function select()
    {
        return $this->render('headline/homepage.html.twig', [
        ]);
    }

    /**
     * @Route("/headline/date", name="headline_date")
     */
    public function indexbydate(ManagerRegistry $doctrine):Response
    {
        $offset = rand(0,10137);
/* The following ONLY works because the RAF entries occupy all dates in order at the beginning of the list*/
        $repository = $doctrine->getRepository(Headline::class);
        /** @var Headline $dateheadline */
        $dateheadline = $repository->find($offset);
        $date = $dateheadline->getDate();

        /** @var Headline $headline */
        $headlines = $repository->findBy(['date' => $date]);
        if (!$headlines) {
            throw $this->createNotFoundException(sprintf('No headline for date "%s"', $date));
        }
        return $this->render('headline/index.html.twig', [
            'headlines' => $headlines,

            ]);
    }

    /**
     * @Route("/headline/sdate", name="headline_sdate")
     */
    public function indexbyselecteddate(ManagerRegistry $doctrine):Response
    {
        $repository = $doctrine->getRepository(User::class);
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
         if (!$user) {
             throw $this->createNotFoundException('No User found');
        }

        $date = $user->getSelectedDate();

        $repository = $doctrine->getRepository(Headline::class);
        /** @var Headline $headline */
        $headlines = $repository->findBy(['date' => $date]);
        if (!$headlines) {
            throw $this->createNotFoundException(sprintf('No headline for date "%s"', $date));
        }
        return $this->render('headline/index.html.twig', [
            'headlines' => $headlines,
        ]);
    }

    /**
     * @Route("/headline/subcampaign", name="headline_subcampaign")
     */
    public function indexbysubcampaign(EntityManagerInterface $em)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
         if (!$user) {
             throw $this->createNotFoundException('No User found');
        }
        $scamp = $user->getSubcampaign();
        
        $repository = $this->getDoctrine()->getRepository(Headline::class);
        /** @var Headline $headline */
        $headlines = $repository->findBy(['subcampaign' => $scamp], ['date' => 'ASC']);
        if (!$headlines) {
            throw $this->createNotFoundException(sprintf('No headline for subcampaign "%s"', $scamp));
        }
        
        return $this->render('headline/index.html.twig', [
            'headlines' => $headlines,
        ]);
    }


    /**
     * @Route("/headline/today", name="headline_today")
     */
    public function today()
    {   
        $repository = $this->getDoctrine()->getRepository(Headline::class);
        $today = new \DateTime();

        /** @var Headline $headlines */
        $headlines = $repository->findOnThisDay($today);
        
         if (!$headlines) {
             throw $this->createNotFoundException('No headline found for ID');
         }

        return $this->render('headline/index.html.twig', [
            'headlines' => $headlines,

        ]);
    }

    /**
     * @Route("/headline/{startid}", name="headline_byid")
     */
    public function index(ManagerRegistry $doctrine):Response
    {   
        /** @var Headline $headlines */
      
        $headlines = $doctrine->getRepository(Headline::class)->findAll();
        if (!$headlines) {
             throw $this->createNotFoundException('No headline found for ID');
        }
        return $this->render('headline/index.html.twig', [
            'headlines' => $headlines,
        ]);
    }

    /**
     * @Route("/headline_show/{id}", name="headline_show")
     */
     public function show(Headline $headline)
    {   
        return $this->render('headline/show.html.twig', [
            'headline' => $headline,
        ]);
    }
}
