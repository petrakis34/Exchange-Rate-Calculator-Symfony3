<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Currency;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    //Create Currency pair
        public function createCurrencyAction(Request $request)
    {   

        $baseCurrency = $request->request->get('baseCurrency');
        $targetCurrency = $request->request->get('targetCurrency');
        $targetPair = $request->request->get('targetPair');
        
        $em = $this->getDoctrine()->getManager();

        $currency = new Currency();
        $currency->setBaseName($baseCurrency);
        $currency->setTargetName($targetCurrency);
        $currency->setTargetPrice($targetPair);


        //tells Doctrine you want to save data 
        $em->persist($currency);

        //actually executes the queries
        $em->flush();

        return $this->redirectToRoute('homepage');
    }

    // if you have multiple entity managers, use the registry to fetch them
    // public function editAction()
    // {
    //     $doctrine = $this->getDoctrine();
    //     $em = $doctrine->getManager();
    //     $em2 = $doctrine->getManager('other_connection');
    // }


    // Show Currency pair
    public function showCurrencyAction($currencyId)
         {
         $currency = $this->getDoctrine()
             ->getRepository(Currency::class)
             ->find($currencyId);

         if (!$currency) {
             throw $this->createNotFoundException(
                 'No product found for id '.$currencyId
             );
         }

         
         // ... do something, like pass the $product object into a template

         return $this->render('default/show.html.twig', array ('currency' => $currency));
    }


    //Update function to prices and currencies
     public function updateCurrencyAction($currencyId)
     {
     $em = $this->getDoctrine()->getManager();
     $currency = $em->getRepository(Currency::class)->find($currencyId);

     if (!$currency) {
         throw $this->createNotFoundException(
             'No currency found for id '.$currencyId
         );
     }

     $currency->setBaseName('EURO');
     $em->flush();

     return $this->redirectToRoute('homepage');
     }


    //Form submit user's input
    public function newAction(Request $request)
    {      //render to new form page
        return $this->render('default/new.html.twig');
    }
}
