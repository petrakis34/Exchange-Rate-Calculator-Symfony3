<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Currency;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
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



    //Form to submit user's input
    public function newAction(Request $request)
    {      
        return $this->render('default/new.html.twig');
    }


    //Show dropdown menu with supported prices
    public function calculatorAction(Request $request)
    {      //render to new form page
        $repository = $this->getDoctrine()->getRepository(Currency::class);
        $currency = $repository->findAll();

        return $this->render('default/calculate.html.twig', $currency = array('currency' => $currency ));
    }


    //Calculate Prices with ajax
    public function calculateAction(Request $request)
    { 
        //we get with post the user's inputs to calculate
        $amount = $request->request->get('amount');
        $id = $request->request->get('currency_id');

        $repository = $this->getDoctrine()->getRepository(Currency::class);
        $currency = $repository->find($id);

        //we make the calculation and send it back
        return $this->json(array('result' => $currency->getTargetPrice() * $amount));

        }



    //Show dropdown menu with supported prices
    public function tableAction(Request $request)
    {      //render to new form page
        $repository = $this->getDoctrine()->getRepository(Currency::class);
        $currency = $repository->findAll();

        return $this->render('default/table.html.twig', $currency = array('currency' => $currency ));
    }


    //Delete table row action after find
    public function deleteTableAction(Request $request)
    {     
        //first we find the db row table to delete
        $rowtoDelete = $request->request->get('id');
        $repository = $this->getDoctrine()->getRepository(Currency::class);
        $currency = $repository->find($rowtoDelete);

        //then we apply entity manager get manager to delete
        $em = $this->getDoctrine()->getManager();
        $em->remove($currency);
        $em->flush();

        return $this->json(array('result'=>"ok" ));
    }


    //edit function to select the pair and redirect to update page
    public function editAction(Request $request)
         {
        //request->query because using GET method to get the id of the pair we selected
        $rowtoEdit = $request->query->get('id');
        $repository = $this->getDoctrine()->getRepository(Currency::class);
        $currency = $repository->find($rowtoEdit);

        return $this->render('default/update.html.twig', array ('currency' => $currency));
    }


    //Update function to prices and currencies
     public function updateAction(Request $request)
     {  
        // we get the default value of the hidden input field that has the id of our selected currency
        // and the rest of the users input fields with post
        $currency_id = $request->request->get('currencyId');
        $baseCurrency = $request->request->get('baseCurrency');
        $targetCurrency = $request->request->get('targetCurrency');
        $targetPair = $request->request->get('targetPair');

        // we find the particular currency by id
        $em = $this->getDoctrine()->getManager();
        $currency = $em->getRepository(Currency::class)->find($currency_id);

        //and we set the new values
        $currency->setBaseName($baseCurrency);
        $currency->setTargetName($targetCurrency);
        $currency->setTargetPrice($targetPair);

        //tells Doctrine you want to save data 
        $em->persist($currency);

        //actually executes the queries
        $em->flush();

        return $this->redirectToRoute('homepage');
    }

}
