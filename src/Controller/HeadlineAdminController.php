<?php

namespace App\Controller;

use App\Entity\Headline;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;


class HeadlineAdminController extends AbstractController
{
    /**
     * @Route("/admin/headline", name="headline_admin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $HeadlineRepository = $this->getDoctrine()->getRepository(Headline::class);        
                
        // Find all the data on the Headline table, filter your query as you need
        $allHeadlinesQuery = $HeadlineRepository->createQueryBuilder('h')
            ->Orderby('h.date', 'ASC')
            ->getQuery();
      
         // Paginate the results of the query
        $headlines = $paginator->paginate(
        // Doctrine Query, not results
        $allHeadlinesQuery,
        // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
                30
        );

        return $this->render('headline_admin/index.html.twig', [
            'headlines' => $headlines,
        ]);
    }

    /**
     * @Route("/admin_headline_show/{id}", name="headline_admin_show")
     */
    public function show(Headline $headline)
    {   
        return $this->render('headline_admin/show.html.twig', [
            'headline' => $headline,
        ]);
    }

    /**
     * @Route("/admin_headline_edit/{id}", name="headline_admin_edit")
     */
    public function edit(Headline $headline)
    {   
        dd('Edit Headline Form');
        
        return $this->render('headline_admin/show.html.twig', [
            'headline' => $headline,
        ]);
    }

}
