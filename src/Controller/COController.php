<?php

namespace App\Controller;

use App\Entity\CO;
use App\Entity\UnitStatus;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class COController extends AbstractController
{
    /**
     * @Route("/co", name="co")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $repository = $this->getDoctrine()->getRepository(CO::class);

        // Find all the data on the CO table, filter your query as you need
        $allCosQuery = $repository->createQueryBuilder('c')
            ->Orderby('c.Fullname', 'ASC')
            ->getQuery();

         // Paginate the results of the query
        $cos = $paginator->paginate(
        // Doctrine Query, not results
        $allCosQuery,
        // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
                20
        );


        return $this->render('co/index.html.twig', [
            'cos' => $cos,
        ]);
    }

    /**
    * @Route("/co/{id}", name="co_show")
    */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(CO::class);
        
        /** @var cos $cos */
        $cos = $repository->find($id);

        if (!$cos) {
            throw $this->createNotFoundException('CO $id not found');
            }

        /** @var unitstatus $USCO  */
        $repository = $this->getDoctrine()->getRepository(UnitStatus::class);
        $USCO = $repository-> findByCO($id);
        dump($USCO);
         return $this->render('co/show.html.twig', [
            'cos' => $cos,
            'unitstatuses' => $USCO,
            ]);
    }
}
